<?php get_header(); ?>

		<section id="nav:content" class="main fl-centered fl-clearfix fl-col-main" role="main">
			<!-- This is where the Table of Contents will be displayed -->
			<div class="flc-toc-tocContainer toc"></div><!-- /.flc-tocContainer -->

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
					<span class="fls-tags"><?php the_tags('', ', '); ?></span>
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
