<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HRLR
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hrlr' ); ?></a>

	<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="main-navigation-menu" aria-expanded="false"></button>
		<div id="main-navigation-menu">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'secondary-menu',
			) );
			?>
		</div>
	</nav><!-- #site-navigation -->

	<div class="body">
		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<span>Columbia</span>
					<span>Human Rights</span>
					<span>Law Review</span>
				</a>
				<?php
				$hrlr_description = get_bloginfo( 'description', 'display' );
				if ( $hrlr_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $hrlr_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		</header><!-- #masthead -->

		<div id="content" class="site-content">
