<!DOCTYPE html>

<html id="fluid-studios" class="no-js" <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo('charset'); ?>" />

<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php if(is_home() && (!$paged || $paged == 1) || is_single() || is_page()) { ?>
<meta name="googlebot" content="index,archive,follow,noodp" />
<meta name="robots" content="all,index,follow" />
<meta name="msnbot" content="all,index,follow" />
<?php } else { ?>
<meta name="googlebot" content="noindex,noarchive,follow,noodp" />
<meta name="robots" content="noindex,follow" />
<meta name="msnbot" content="noindex,follow" />
<?php } ?>

<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<?php $template_url = get_bloginfo( 'template_url', 'display' ); ?>

<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/framework/fss/css/fss-reset-global.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/framework/fss/css/fss-layout.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/framework/fss/css/fss-text.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/components/uiOptions/css/fss/fss-theme-bw-uio.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/components/uiOptions/css/fss/fss-theme-wb-uio.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/components/uiOptions/css/fss/fss-theme-by-uio.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/components/uiOptions/css/fss/fss-theme-yb-uio.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/components/uiOptions/css/fss/fss-text-uio.css" media="all" />

<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/lib/jquery/ui/css/fl-theme-hc/hc.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/lib/jquery/ui/css/fl-theme-hci/hci.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/lib/jquery/ui/css/fl-theme-by/by.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/lib/jquery/ui/css/fl-theme-yb/yb.css" media="all" />

<link rel="stylesheet" type="text/css" href="<?php echo $template_url; ?>/infusion/components/uiOptions/css/FatPanelUIOptions.css" media="all" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="all" />

<script src="<?php echo $template_url; ?>/infusion/MyInfusion.js"></script>
<script src="<?php echo $template_url; ?>/js/fluid-studios.js"></script>
<script src="<?php echo $template_url; ?>/js/modernizr.js"></script>

<title><?php if (function_exists('is_tag') && is_tag()) { single_tag_title("Entries tagged &quot;"); echo'&quot; &mdash; '; } elseif (is_archive()) { wp_title(''); echo ' Archive &mdash; '; } elseif (is_search()) { echo 'Search for &quot;'.esc_html($s).'&quot; &mdash; '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' &mdash; '; } elseif (is_404()) { echo '404 Error &mdash; Page not found &mdash; '; } if (is_home()) { bloginfo('name'); echo ' &mdash; '; bloginfo('description'); } else { bloginfo('name'); } ?><?php if ($paged>1) { echo ' &mdash; page '. $paged; } ?></title>

<link rel="shortcut icon" href="<?php echo $template_url; ?>/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo $template_url; ?>/apple-touch-icon.png"/>
		
<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
	wp_head(); 
?>

</head>

<body id="nav:page-top" <?php body_class('fls-theme'); ?>>

  <div class="flc-uiOptions-fatPanel fl-uiOptions-fatPanel">
	  <!-- This is the div that will contain the UI Options component -->
  	<div id="myUIOptions" class="flc-slidingPanel-panel flc-uiOptions-iframe fs-uiOptions-panel"></div>	 

	  <!-- This div is for the sliding panel that shows and hides the UI Options controls -->
  	<div class="fl-panelBar">
  		<button class="flc-slidingPanel-toggleButton fl-toggleButton">Show display preferences</button>
  	</div>
  </div>	

	<script>
		// Instantiate the UI Enhancer component, specifying the table of contents' template URL
		fluid.pageEnhancer({
			tocTemplate: "<?php echo $template_url; ?>/infusion/components/tableOfContents/html/TableOfContents.html",
			classnameMap: {
				theme: {
					"default": "fls-theme"
				}
			}
		});
	
		// Start up UI Options
		var uio = fluid.uiOptions.fatPanel(".flc-uiOptions-fatPanel", {
			prefix: "<?php echo $template_url; ?>/infusion/components/uiOptions/html/",
		   slidingPanel: {
			   options: {
				   strings: {
					   showText: "Show Display Preferences",
					   hideText: "Hide Display Preferences"
				   }
			   }
		   }
		});
	</script>

	<div class="fls-wrapper">
		<header class="fls-banner" role="banner">
			<div class="fls-masthead fl-centered fl-clearfix">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>

				<<?php echo $heading_tag; ?> class="fls-logo">
					<a href="/" title="Fluid Studios Home" class="fl-hidden-replace" rel="home">Fluid Studios</a>
				</<?php echo $heading_tag; ?>>
				<nav class="fls-access">
					<ul class="fl-clearfix">
						<li id="uioProxyButton" class="fl-toggleButton"><a href="#">Show display preferences</a></li>
						<li class="fls-loginout-link"><?php wp_loginout(); ?></li>
						<?php if(is_single()) echo('<li class="fls-back-link"><!-- Note: The id "flsc-go-back-link" is used @ js/fluid-studios.js. Synchronizing both is the key to have "back" link work. -->
						<a href="#" id="flsc-go-back-link" title="Go Back">Back<span> to <span>fluid</span><span>STUDIOS</span></span></a></li>'); ?>

					</ul>
					<script>
						$("#uioProxyButton").click(function () {
						uio.slidingPanel.togglePanel();
						});
					</script>
				</nav><!-- /.fls-access -->
			</div><!-- /.fls-masthead -->
		</header><!-- /.fls-banner -->
