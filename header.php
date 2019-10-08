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



	<style type="text/css">
	    @font-face{
			    font-family: 'Unica';
	        src:url("/wp-content/themes/hrlr/assets/fonts/unica/1492043/40d7aa1f-ca63-4fe3-9e10-41a87c7c1ee7.eot?#iefix");
	        src:url("/wp-content/themes/hrlr/assets/fonts/unica/1492043/40d7aa1f-ca63-4fe3-9e10-41a87c7c1ee7.eot?#iefix") format("eot"),
							url("/wp-content/themes/hrlr/assets/fonts/unica/1492043/c1189892-2117-4b4f-bdbc-c2483115c58d.woff2") format("woff2"),
							url("/wp-content/themes/hrlr/assets/fonts/unica/1492043/13fb76cf-cc84-4ee6-80e9-f472a123b2d3.woff") format("woff"),
							url("/wp-content/themes/hrlr/assets/fonts/unica/1492043/e2a6861c-46fe-436b-85fc-e36505d20561.ttf") format("truetype");
					font-weight: bold;
			    font-style: normal;
		  }
	    @font-face{
			    font-family: 'Unica';
	        src:url("/wp-content/themes/hrlr/assets/fonts/unica/1492063/aaa2c11e-e459-43b4-8ad2-8c7c1de5c4e3.eot?#iefix");
	        src:url("/wp-content/themes/hrlr/assets/fonts/unica/1492063/aaa2c11e-e459-43b4-8ad2-8c7c1de5c4e3.eot?#iefix") format("eot"),
							url("/wp-content/themes/hrlr/assets/fonts/unica/1492063/773f22a7-9bd8-48bf-8331-9f3b52306ac2.woff2") format("woff2"),
							url("/wp-content/themes/hrlr/assets/fonts/unica/1492063/60bebbcf-ba00-4ac4-ad6b-a350fd1903bf.woff") format("woff"),
							url("/wp-content/themes/hrlr/assets/fonts/unica/1492063/7e3bd97a-acff-4781-9d63-80f4111a637e.ttf") format("truetype");
					font-weight: normal;
			    font-style: normal;
		  }
	    @font-face{
			    font-family: 'Unica';
	        src:url("/wp-content/themes/hrlr/assets/fonts/unica/1492584/d2d20958-b8af-4ead-9d20-40e7f73fed27.eot?#iefix");
	        src:url("/wp-content/themes/hrlr/assets/fonts/unica/1492584/d2d20958-b8af-4ead-9d20-40e7f73fed27.eot?#iefix") format("eot"),
							url("/wp-content/themes/hrlr/assets/fonts/unica/1492584/14edc779-3a2a-4f43-b759-691d28f4942c.woff2") format("woff2"),
							url("/wp-content/themes/hrlr/assets/fonts/unica/1492584/2b711ce0-e7a4-4569-9c98-3e1dbe54720d.woff") format("woff"),
							url("/wp-content/themes/hrlr/assets/fonts/unica/1492584/98595864-b5cc-46a4-b6cc-c9470802c8f5.ttf") format("truetype");
					font-weight: normal;
			    font-style: italic;
			}
			@font-face {
			    font-family: 'Burgess';
			    src: url('/wp-content/themes/hrlr/assets/fonts/burgess/burgess-regular-pro.eot');
			    src: url('/wp-content/themes/hrlr/assets/fonts/burgess/burgess-regular-pro.eot?#iefix') format('embedded-opentype'),
			         url('/wp-content/themes/hrlr/assets/fonts/burgess/burgess-regular-pro.woff2') format('woff2'),
			         url('/wp-content/themes/hrlr/assets/fonts/burgess/burgess-regular-pro.woff') format('woff'),
			         url('/wp-content/themes/hrlr/assets/fonts/burgess/burgess-regular-pro.ttf') format('truetype');
			    font-weight: normal;
			    font-style: normal;
			}
	</style>



	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'hrlr' ); ?></a>

	<nav id="site-navigation" class="main-navigation">
		<div class="scroll-container">
			<button class="menu-toggle" aria-controls="main-navigation-menu" aria-expanded="false"></button>
			<div id="main-navigation-menu">
				<ul class="hrlr-menu">
					<?php
						$page_titles = (object) [
							"Human&nbsp;Rights Law&nbsp;Review" => '/hrlr',
							"HRLR Online" => "/hrlr-online",
							"A&nbspJailhouse Lawyers'&nbspManual" => "http://jlm.law.columbia.edu",
							"Trump&nbspHuman Rights&nbspTracker" => "https://trumphumanrightstracker.law.columbia.edu",
						];
						$index = 1;
						foreach ($page_titles as $title=>$url):
					?>
					<li class="hrlr-menu-item" >
						<a href="<?php echo $url; ?>">
							<?php echo $title; ?>&nbsp;<sup><?php echo ($index); ?></sup>
							<?php $index++; ?>
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

						$page_titles = (object) [
							"About" => '/about',
							"Submissions" => "/submissions",
							"News" => "/news",
						];
						foreach ($page_titles as $title=>$url):
					?>
					<li class="hrlr-menu-item" >
						<a href="<?php echo $url; ?>">
							<?php echo $title; ?>
						</a>
					</li>
					<?php endforeach; ?>
					<li class="hrlr-menu-item-secondary" >
						<a href="https://twitter.com/hrlronline">Twitter</a>, <a href="mailto:jrnhum@law.columbia.edu ">Email</a>
					</li>
				</ul>
			</div>
		</div>
	</nav><!-- #site-navigation -->

	<div class="body">
		<header id="masthead" class="site-header">
			<div class="site-branding">
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo esc_url( home_url( '/wp-content/themes/hrlr/assets/icons/logo.svg' ) );?>">
				</a>
			</div><!-- .site-branding -->
		</header><!-- #masthead -->

			<?php if (is_post_type_archive( ["hrlr", "hrlr_online"] )): ?>
				<div class="publication-navigation">
					<div class="publication-navigation-item hrlr-headline-large <?php if (is_post_type_archive( ["hrlr"] )) { echo "is-selected"; }?>">
						<a href="/hrlr/">H.&nbsp;R.&nbsp;L.&nbsp;R.</a>
					</div>
					<div class="publication-navigation-item hrlr-online-headline-large <?php if (is_post_type_archive( ["hrlr_online"] )) { echo "is-selected"; }?>">
						<a href="/hrlr-online/">HRLR&nbsp;Online</a>
					</div>
				</div>
			<?php endif; ?>

			<?php if (is_singular("news")): ?>
				<div class="news-navigation hrlr-online-headline-large">
					<a href="/news/">News &#10548;&#xFE0E;</a>
				</div>
			<?php endif; ?>



		<div id="content" class="site-content">
