						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header>
								<div class="fs-post-thumbnail">
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'fluid-studios' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php 
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
                                <?php
                                $tags = get_the_tags();
                                if ($tags) {
                                    $html = '<div class="fs-tags post_tags">';
                                    // always display at least the first tag
                                    $firsttag = array_shift($tags);
                                    $html .= Studios_build_html($firsttag);
                                    $display = "{$firsttag->name}";
                                    foreach($tags as $tag) {
                                        $newlen = strlen($display) + strlen($tag->name);
                                        // only add next tag if it fits within the limit
                                        if ($newlen < MAX_CHARS_IN_SUMMARY_TAG_LIST) {
                                            $display .= ", {$tag->name}";
                                            $html .= ", ".Studios_build_html($tag);
                                        } else {
                                            // if there are undisplay tags, show ellipses
                                            $html .= "...";
                                            break;
                                        }
                                    }
                                    $html .= '</div>';
                                    echo $html;
                                }
                                ?>
							</footer><!-- /.entry-utility -->
						</article><!-- /#post-<?php the_ID(); ?> -->
				