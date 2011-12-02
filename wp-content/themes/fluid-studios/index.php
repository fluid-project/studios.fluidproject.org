<?php get_header(); ?>

		<div id="content-container" class="fl-clearfix fl-col-mixed2 fl-push">

<?php get_sidebar(); ?>

            <section id="nav:content" class="fl-clearfix fl-col-main" role="main">

                <ul class="fl-grid">
    				<?php 
    				if (have_posts()) : 
    					while (have_posts()) : 
    						the_post();
    				?>
    
                    <li>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header>
                                <div class="fs-post-thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php 
                                    if ( has_post_thumbnail() ) {
                                        // the current post has a thumbnail
                                        the_post_thumbnail();
                                    } else {
                                        // the current post lacks a thumbnail, display the default picture
                                        echo '<img alt="Featured image is missing" src="' . get_template_directory_uri() .'/images/placeholder.jpg" width="' . THUMBNAIL_WIDTH . '" />';
                                    }
                                    ?></a>
                                </div>
                                <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Direct Link to <?php the_title_attribute(); ?>"><?php echo the_title('', '', false); ?></a></h2>
                            </header>
                            <section class="entry-content">
                                <?php echo the_excerpt(); ?>
                            </section><!-- /.entry-content -->
                            <footer class="entry-utility">
                                <div class="fs-tags"><?php the_tags("", ", "); ?></div> 
                            </footer><!-- /.entry-utility -->
                        </article><!-- /#post-<?php the_ID(); ?> -->
                    </li>
    				<?php endwhile; ?>
                </ul>

				<?php 
				$next_posts = get_next_posts_link('&laquo; Older articles');
				$prev_posts = get_previous_posts_link('Newer articles &raquo;');
				if( $next_posts || $prev_posts ) { ?><nav id="next-prev-links">
					<ul class="fl-container-flex fl-clearfix">
						<?php if( $next_posts ) echo '<li class="alignleft">'.$next_posts.'</li>'; ?>

						<?php if( $prev_posts ) echo '<li class="alignright">'.$prev_posts.'</li>'; ?>

					</ul>
				</nav><!-- /#next-prev-links -->
				<?php } ?>

				<?php else : ?>

				<?php include (TEMPLATEPATH . '/inc/not-found.php' ); ?>

				<?php endif; ?>

			</section><!-- /#nav:content -->

        </div><!-- /#content-container -->

<?php get_footer(); ?>