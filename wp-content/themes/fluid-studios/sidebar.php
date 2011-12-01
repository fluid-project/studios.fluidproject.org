			<aside id="sidebar" class="fl-clearfix fl-col fl-container-flex25" role="complementary">
				<div id="fs-loginout-link">
					<?php wp_loginout(); ?>
				</div>
				
				<div id="fs-fluid-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="Fluid Studio Logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-fluidSTUDIOS.png" /></a>
				</div>
			</aside><!-- /#sidebar -->
