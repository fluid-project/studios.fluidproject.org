<?php

// Deregister jQuery that ships with WordPress, Infusion ships with it's own copy
if( !is_admin()){
	wp_deregister_script('jquery');
}

// Custom comments
if ( ! function_exists( 'Studios_comment' ) ) :
function Studios_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<header class="comment-header comment-author vcard">
				<p><?php echo get_avatar( $comment, '60', '', 'Comment authors avatar' ); ?>
				<?php printf( __( '%s says:', 'Studios' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></p>
			</header><!-- /.comment-author /.vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation...', 'Studios' ); ?></em>
			<?php endif; ?>

		<section class="comment-content"><?php comment_text(); ?></section>

		<footer class="comment-utility">
			<ul>
				<li>Comment posted <time datetime="<?php the_time('Y-m-d') ?>" pubdate="pubdate"><?php printf( __( '%1$s', 'Studios' ), get_comment_date() ); ?></time><?php edit_comment_link( __( 'Edit', 'Studios' ), ' ' ); ?><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> &mdash; <span class="top"><a href="#nav:page-top" title="Return to the TOP of this page">TOP</a></span></li>
			</ul>
		</footer><!-- /.comment-utility -->

	</div><!-- /#comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'Studios' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'Studios' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

// Customized comment reply link
function my_replylink($c='',$post=null) {
  global $comment;
  // bypass
  if (!comments_open() || $comment->comment_type == "trackback" || $comment->comment_type == "pingback") return $c;
  // patch
  $id = $comment->comment_ID;
  $reply = 'Reply to this comment...';
  $o = '<span class="comment-reply"><a class="comment-reply-link" href="'.get_permalink().'?replytocom='.$id.'#respond">'.$reply.'</a></span>';
  return $o;
}
add_filter('comment_reply_link', 'my_replylink');

// remove WordPress version info from head and feeds
	function complete_version_removal() {
		return '';
	}
	add_filter('the_generator', 'complete_version_removal');

// register main navigation
	add_action( 'init', 'register_main_nav_menu' );

	function register_main_nav_menu() {
		register_nav_menu( 'main_nav', __( 'Main Navigation Menu' ) );
	}

// register sidebar widget
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'before_widget' => '<li class="fl-clearfix fl-widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	}

// prevent duplicate content for comments
	function noDuplicateContentforComments() {
		global $cpage, $post;
		if($cpage > 1) {
		echo "\n".'<link rel="canonical" href="'.get_permalink($post->ID).'" />'."\n";
		}
	}
	add_action('wp_head', 'noDuplicateContentforComments');

// Remove the Login Error Message
add_filter('login_errors',create_function('$a', "return null;"));

// Credit
	function custom_admin_footer() {
		echo 'Studios is developed by <a href="http://abledaccess.com/">Abledaccess</a> in partnership with <a href="http://fluidproject.org/">The Fluid Project</a>.';
	} 
	add_filter('admin_footer_text', 'custom_admin_footer');

// add Twitter handle in user profiles
	function Studios_contactmethods($contactmethods) {
		$contactmethods['twitter'] = 'Twitter Handle';
		return $contactmethods;
	}
	
	add_filter('user_contactmethods', 'Studios_contactmethods', 10, 1);

// enable threaded comments
	function enable_threaded_comments(){
		if (!is_admin()) {
			if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
				wp_enqueue_script('comment-reply');
			}
	}
	add_action('get_header', 'enable_threaded_comments');

?>