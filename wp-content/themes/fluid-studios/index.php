<?php get_header(); ?>

		<div id="content-container" class="fl-clearfix fl-col-mixed2 fl-push">

<?php get_sidebar(); ?>

			<section id="nav:content" role="main">
				<div class="fl-clearfix fl-col-main">

					<!-- This is where the Table of Contents will be displayed -->
					<div class="flc-toc-tocContainer toc"> </div>
	
					<ul class="fl-grid">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
						<li><?php include (TEMPLATEPATH . '/inc/single-post-summary.php' ); ?></li>
	
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

				</div>
			</section><!-- /#nav:content -->

				<?php get_footer(); ?>

		</div><!-- /#content-container -->
