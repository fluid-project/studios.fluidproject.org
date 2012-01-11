						<article id="post-<?php the_ID(); ?>" <?php post_class('index-summary'); ?>>
							<header>
								<div class="fs-post-thumbnail">
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'fluid-studios' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php 
									if ( has_post_thumbnail() ) {
										// the current post has a thumbnail
										the_post_thumbnail();
									} else {
										// the current post lacks a thumbnail, display the default picture
										echo '<img alt="Featured image is missing" src="' . get_stylesheet_directory_uri() .'/images/placeholder.jpg" width="240" height="160" />';
									}
									?></a>
								</div>
								<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Direct Link to <?php the_title_attribute(); ?>"><?php echo the_title('', '', false); ?></a></h2>
							</header>
							<section class="entry-content">
								<?php echo the_excerpt(); ?>
							</section><!-- /.entry-content -->
							<footer class="entry-utility">
								<?php echo fl_tags_summary(get_the_tags()); ?>
							</footer><!-- /.entry-utility -->
						</article><!-- /#post-<?php the_ID(); ?> -->
				