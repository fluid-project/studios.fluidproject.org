<?php get_header(); ?>

		<div id="content-container" class="fl-clearfix fl-col-mixed2 fl-push">

<?php get_sidebar(); ?>

			<section id="nav:content" class="fl-clearfix fl-col-main" role="main">

				<?php if (have_posts()) : ?>

				<h1>Search results for &quot;<?php the_search_query(); ?>&quot;</h1>

				<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<ol id="search-results">

						<?php query_posts($query_string . '&posts_per_page=10'); ?><?php while (have_posts()) : the_post(); ?>

						<li>
							<header>
								<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Direct Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<p class="entry-meta">Posted <time datetime="<?php the_time('Y-m-d') ?>" pubdate="pubdate"><?php the_time('F jS, Y') ?></time> by <?php the_author(); ?></p>
							</header>
							<section class="entry-content">
								<?php the_excerpt(); ?>
							</section><!-- /.entry-content -->
							<footer class="entry-utility">
								<ul>
									<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Direct Link to <?php the_title_attribute(); ?>">Direct link to &quot;<?php the_title(); ?>&quot;</a></li>
									<li>Filed under <?php the_category(', '); ?> &mdash; <?php comments_popup_link('Comment on this post&hellip;', '1 comment on this post&hellip;', '% comments&hellip;'); ?></li>
									<li class="top"><a href="#nav:page-top" title="Return to the TOP of this page">TOP</a></li>
								</ul>

							</footer><!-- /.entry-utility -->
						</li>

						<?php endwhile; ?>

					</ol>
				</section><!-- /.search -->

				<?php 
				$next_posts = get_next_posts_link('More results &raquo;');
				$prev_posts = get_previous_posts_link('&laquo; Previous results');
				if( $next_posts || $prev_posts ) { ?><nav id="next-prev-links">
					<ul class="fl-container-flex fl-clearfix">
						<?php if( $next_posts ) echo '<li class="alignright">'.$next_posts.'</li>'; ?>

						<?php if( $prev_posts ) echo '<li class="alignleft">'.$prev_posts.'</li>'; ?>

					</ul>
				</nav><!-- /#next-prev-links -->
				<?php } ?>

				<?php else : ?>

				<?php include (TEMPLATEPATH . '/inc/search-not-found.php' ); ?>

				<?php endif; ?>

                <?php get_footer(); ?>

			</section><!-- /#nav:content -->

        </div><!-- /#content-container -->
