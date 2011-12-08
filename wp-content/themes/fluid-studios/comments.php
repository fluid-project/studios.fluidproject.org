
				<section id="comments">
	<?php if ( post_password_required() ) : ?>
					<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'Studios' ); ?></p>
				</div><!-- /#comments -->
	<?php
			return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
				<h3 id="comments-title"><?php
				printf( _n( 'One Comment to %2$s', '%1$s Comments to %2$s', get_comments_number(), 'Studios' ),
				number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
				?></h3>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<div class="navigation">
					<div class="alignleft"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'Studios' ) ); ?></div>
					<div class="alignright"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'Studios' ) ); ?></div>
				</div> <!-- /.navigation -->
	<?php endif; // check for comment navigation ?>

						<ol class="commentlist">
							<?php
								wp_list_comments( array( 'callback' => 'Studios_comment' ) );
							?>
						</ol><!-- /.commentlist -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<div class="navigation">
					<div class="alignleft"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'Studios' ) ); ?></div>
					<div class="alignright"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'Studios' ) ); ?></div>
				</div><!-- /.navigation -->
	<?php endif; // check for comment navigation ?>

	<?php else : // or, if we don't have comments:

		if ( ! comments_open() ) :
	?>
	<?php endif; // end ! comments_open() ?>

	<?php endif; // end have_comments() ?>

	<?php comment_form(array(
		'title_reply' => __( 'Got something you\'d like to add?' ),
		'title_reply_to' => __( 'Leave a reply to %s\'s comment' ),
		'cancel_reply_link' => __( 'Cancel your reply&hellip;' ),
		'comment_notes_before' => '<p class="comment-notes">' . __( '... Leave it below. Your email address will not be published.' ) . '</p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out</a>.' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( get_permalink() ) ) . '</p>',
		'fields' => array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">(required)</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
		'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">(required)</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /></p>',
		'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'),
		'twitter' => '<p class="comment-form-twitter"><label for="twitter">' . __( 'Twitter (@username)' ) . '</label><input type="text" id="twitter" name="twitter" value="" size="30" /></p>',
		'label_submit' => __( 'Post!' )
	)); ?>

	</section><!-- /#comments -->
