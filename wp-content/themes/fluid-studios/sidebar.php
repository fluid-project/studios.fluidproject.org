			<aside id="sidebar" class="fl-clearfix fl-col fl-container-flex25" role="complementary">
				<ul>
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

					<li>
						<?php get_search_form(); ?>
					</li>

					<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>

					<li>
						<h2>Archives</h2>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
					</li>

					<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>

					<?php wp_list_bookmarks(); ?>

					<li>
						<h2>Meta</h2>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<li><a href="http://wordpress.org/" title="Proudly Powered by WordPress" rel="nofollow">WordPress</a></li>
							<?php wp_meta(); ?>
						</ul>
					</li>

				<?php endif; ?>
				</ul>
			</aside><!-- /#sidebar -->

		</div><!-- /#content-container -->
