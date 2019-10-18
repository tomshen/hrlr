<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package HRLR
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<h1 class="page-title"><?php esc_html_e( 'The requested resource cannot be found.', 'hrlr' ); ?></h1>
				<a class="secondary-text button forwards" href="/">Return home</a>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
