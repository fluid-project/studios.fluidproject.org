<?php get_header(); ?>

		<div id="content-container" class="fl-clearfix fl-col-mixed2 fl-push">

<?php get_sidebar("non-index"); ?>

			<section id="nav:content" class="fl-clearfix fl-col-main" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
						<?php the_tags('', ', '); ?>
					</header>

					<section class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					</section><!-- /.entry-content -->
				</article><!-- /#post-<?php the_ID(); ?> -->

				<?php endwhile; else: ?>

					<?php include (TEMPLATEPATH . '/inc/not-found.php' ); ?>

				<?php endif; ?>

			</section><!-- /#nav:content -->

                <?php get_footer(); ?>

        </div><!-- /#content-container -->
