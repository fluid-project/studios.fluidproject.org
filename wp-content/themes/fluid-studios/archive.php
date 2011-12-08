<?php get_header(); ?>

		<div id="content-container" class="fl-clearfix fl-col-mixed2 fl-push">

<?php get_sidebar("non-index"); ?>

			<section id="nav:content" class="fl-clearfix fl-col-main" role="main">

			<?php if (have_posts()) : ?>

				<?php $post = $posts[0]; // hack: set $post so that the_date() works ?>
				<?php if (is_category()) { ?>
				<h1>Archive for the &quot;<?php single_cat_title(); ?>&quot; Category</h1>
				<?php if (strlen(trim(category_description())) > 0 && trim(category_description()) != "<br />") {
					echo category_description();
					}
				?>

				<?php } elseif(is_tag()) { ?>
				<h1>Posts Tagged &quot;<?php single_tag_title(); ?>&quot;</h1>

				<?php } elseif (is_day()) { ?>
				<h1>Archive for <?php the_time('F jS, Y'); ?></h1>

				<?php } elseif (is_month()) { ?>
				<h1>Archive for <?php the_time('F, Y'); ?></h1>

				<?php } elseif (is_year()) { ?>
				<h1>Archive for <?php the_time('Y'); ?></h1>

				<?php } elseif (is_author()) { ?>
				<h1>Author Archive</h1>

				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1>Blog Archives</h1>

			<?php } ?>
			<?php query_posts($query_string . '&posts_per_page=1'); ?>
				<ul class="fl-grid">
			<?php while (have_posts()) : the_post(); ?>

				<li><?php include (TEMPLATEPATH . '/inc/single-post-summary.php' ); ?></li>

			<?php endwhile; ?>
				</ul>

				<?php 
				$next_posts = get_next_posts_link('&laquo; Older archives');
				$prev_posts = get_previous_posts_link('Newer archives &raquo;');
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

                <?php get_footer(); ?>

			</section><!-- /#nav:content -->

        </div><!-- /#content-container -->

