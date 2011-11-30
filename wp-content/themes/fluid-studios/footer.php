
	</div><!-- /#wrapper -->
	
	<footer class="contentinfo fl-clearfix fl-push" role="contentinfo">
		<section id="colophon">
			<ul>
				<li>&copy; <?= date('Y'); ?> <?php bloginfo('name'); ?></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to Posts Feed">Entries (<abbr title="Really Simple Syndication">RSS</abbr>)</a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="Subscribe to Comments Feed">Comments (<abbr title="Really Simple Syndication">RSS</abbr>)</a></li>
				<li><a href="#nav:page-top" title="Return to the TOP of this page">TOP</a></li>
			</ul>
		</section><!-- /#colophon -->

	<?php wp_footer(); ?>

	</footer><!-- /.contentinfo -->

</body>

</html>