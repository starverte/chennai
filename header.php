<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Flint
 * @sub-package Chennai
 * @since Chennai 0.9
 */
?><!DOCTYPE html>
<!--[if lt IE 9]><html <?php language_attributes(); ?> class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php steel_head(); ?>
<?php wp_head(); ?>
</head>

<?php $sparks_options = get_option('sparks_options'); ?>
<body <?php body_class(); ?>>
<?php if (isset($sparks_options['fb_app_id'])) {
		$fb_app_id = $sparks_options["fb_app_id"];
	}
	else {
		$fb_app_id = '';
	} ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $fb_app_id; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header wrapper" role="banner">
    
    <?php if (current_theme_supports('custom-header')) { ?>
          
		
        <hgroup class="row-fluid">
	<div id="left" class="span9">
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            	<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
            </a>
            
        <?php if (display_header_text()) { ?>
        	<div class="bastard-title">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" ><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        <?php } ?>
	</div><!-- #left -->
        
        <?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) { ?>
            <img class="header span3 visible-desktop" src="<?php header_image(); ?>" alt="" />
        <?php } // if ( ! empty( $header_image ) ) ?>
        
        </hgroup>
        
  	<?php } else { ?>
	
        <hgroup>
          	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            	<img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
            </a>
	        <div class="bastard-title">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" ><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
		</hgroup>
        
   	<?php } ?>

		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'flint' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'flint' ); ?>"><?php _e( 'Skip to content', 'flint' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<?php get_search_form(); ?>
		</nav><!-- .site-navigation .main-navigation -->
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main wrapper">
