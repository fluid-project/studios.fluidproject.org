<?php get_header(); ?>

		<div id="content-container" class="fl-clearfix fl-container fl-container-flex fl-push">

			<section id="nav:content" class="fl-clearfix fl-col fl-container-flex75" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Direct Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					</header>
					<section class="entry-content">

						<?php the_content('Continue reading "'.the_title('', '', false).'"...'); ?>

					</section><!-- /.entry-content -->
					<footer class="entry-utility">
							<ul>
								<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Direct Link to <?php the_title_attribute(); ?>">Direct link to &quot;<?php the_title(); ?>&quot;</a></li>
								<li>Filed under <?php the_category(', '); ?> &mdash; <?php comments_popup_link('Comment on this post&hellip;', '1 comment on this post&hellip;', '% comments&hellip;'); ?></li>
								<li class="top"><a href="#nav:page-top" title="Return to the TOP of this page">TOP</a></li>
							</ul>

					</footer><!-- /.entry-utility -->
				</article><!-- /#post-<?php the_ID(); ?> -->

				<?php endwhile; ?>

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

<?php get_sidebar(); ?>

<?php get_footer(); ?>