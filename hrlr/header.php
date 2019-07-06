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
			<ul class="hrlr-menu">
				<?php
					$page_titles = array(
						"Human Rights Law Review",
						"HRLR Online",
						"A Jailhouse Lawyers' Manual",
						"Trump Human Rights Tracker",
					);
					foreach ($page_titles as $index=>$title):
				?>
				<li class="hrlr-menu-item" >
					<a href="<?php echo get_permalink(get_page_by_title($title)); ?>">
						<?php echo $title; ?>
						<sup><?php echo ($index + 1); ?></sup>
					</a>
				</li>
				<?php endforeach; ?>
				<?php
					$footnotes = array(
						"The flagship journal, each volume published in three issues every academic year.",
						"An online forum for rigorous discussion and analysis of current issues in human rights law.",
						"A handbook of legal rights and procedures designed for use by people in prison.",
						"A tool to track the Trump administration’s actions and their impact on human rights.",
					);
					foreach ($footnotes as $index=>$footnote):
				?>
				<li class="hrlr-menu-footnote hrlr-menu-footnote-<?php echo ($index + 1); ?>">
					<sup><?php echo ($index + 1); ?></sup>
					<?php echo $footnote; ?>
				</li>
				<?php endforeach; ?>
			</ul>
			<ul class="hrlr-menu">
				<?php
					$page_titles = array(
						"About",
						"Submissions",
						"News",
					);
					foreach ($page_titles as $title):
				?>
				<li class="hrlr-menu-item" >
					<a href="<?php echo get_permalink(get_page_by_title($title)); ?>">
						<?php echo $title; ?>
					</a>
				</li>
				<?php endforeach; ?>
				<li class="hrlr-menu-item-secondary" >
					<a href="https://twitter.com/hrlronline">Twitter</a>, <a href="mailto:jrnhum@law.columbia.edu ">Email</a>
				</li>
			</ul>
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
