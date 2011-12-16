<?php
/*
Plugin Name: Restrict the length of the post title
Description: Restrict the post title length to a predefined limit. Once the limit is reached at creating or editing a post, any furthur input is not allowed.
Version: 0.1
Author: Fluid Studios Team
Author URI: http://studios.fluidproject.org/

This plugin is created based on another plugin named "Limit a post title to X characters" and authored by Jean-Philippe Murray.
(The plugin site of "Limit a post title to X characters": http://wordpress.org/extend/plugins/limit-a-post-title-to-x-characters/) 
*/

// The maximum number of characters in the "new post" page, "title" field
if ( ! defined("FL_MAX_CHARS_IN_TITLE") ) define("FL_MAX_CHARS_IN_TITLE", 80);

// Add initial actions
add_action('admin_menu', 'fl_title_length_admin_menu');
add_action('init', 'fl_title_length_include_scripts');

// Register the actions at plugin activation & deactivation
register_activation_hook( __FILE__, 'fl_title_length_set_default_options' );
register_deactivation_hook( __FILE__, 'fl_title_length_delete_options' );

// Update the option when the "save" request is received from the admin settings page
// Checking on an "action" value rather than "save" because "save" is commonly used by other wordpress pages,
// which produces 'Are you sure to do this' error at conflict.
if( $_POST['action'] == 'fl_title_length_set_options' ) {
	add_action( 'init','fl_title_length_update_options');
};

// Define the admin page
function fl_title_length_admin_menu() {
	add_options_page(__('Post Title Length','fl-title-length'), __('Post Title Length','fl-title-length'), 'manage_options', 'fl_title_length_admin_menu', 'fl_title_length_create_admin_page');
}

// Include the scripts into the footer
function fl_title_length_include_scripts(){
	wp_enqueue_script( 'fl-title-length-js', WP_PLUGIN_URL . '/fl-title-length/js/fl-title-length.js', array('jquery'), false , true );
	$js_parameters = array( 'post_length' => get_option('fl_title_length') );
	wp_localize_script( 'fl-title-length-js', 'fl_post_length_params', $js_parameters );
}

// Set the default option value
function fl_title_length_set_default_options(){
	add_option( 'fl_title_length', FL_MAX_CHARS_IN_TITLE );
}

// Delete the option.
function fl_title_length_delete_options(){
	delete_option( 'fl_title_length' );
}

// Update the option with the posted value from the admin page
function fl_title_length_update_options(){
	check_admin_referer('fl-title-length-set-options');
	update_option( 'fl_title_length', $_POST['max_count'] );
	$_POST['notice'] = __('Option saved');
}

// Generate the admin settings page 
function fl_title_length_create_admin_page(){?>
	<div class="wrap">
		<div class="icon32"></div>
		<h2><?php _e('Define Post Title Length','fl-title-length');?></h2>
		<?php if($_POST['notice']):?>
			<div class="updated fade"><p><strong><?php echo $_POST['notice'];?></strong></p></div>
		<?php endif; ?>
		<form method="post" action="" enctype="multipart/form-data">
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row"><label for="blogname">Maximum characters allowed:</label></th>
						<td><input type="text" class="regular-text" value="<?php echo get_option('fl_title_length'); ?>" name="max_count"></td>
					</tr>
					<tr>
						<td colspan="2"><span class="description">Be cautious that reducing the post title length cuts the existing post title to the new length at re-editting.</span></td>
					</tr>
					<tr valign="top">
						<td>
							<?php if( function_exists( 'wp_nonce_field' )) wp_nonce_field('fl-title-length-set-options'); ?>
							<input name="action" value="fl_title_length_set_options" type="hidden" />
							<input class="button-primary" type="submit" name="save" value="<?php _e('Save','fl-title-length'); ?>" />
						</td>
					</tr>
				</tbody>
				
			</table>
		</form>
	</div>
<?php
}
?>