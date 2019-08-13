<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HRLR
 */

get_header();
?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="archive-navigation">
				<div class="archive-navigation-link"><a href="/category/hrlr">H. R. L. R.</a></div>
				<div class="archive-navigation-link">HRLR Online</div>
			</div>

			<div class="online-posts-container">
				<div class="online-posts-header">
					<h2 class="online-posts-header-volume">HRLR Online</h2>
					<?php $catquery = new WP_Query( 'category_name=hrlr-online&posts_per_page=5' ); ?>
					<div class="online-posts">
						<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
							<div class="online-post">
								<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
								<div class="online-post-meta"><?php the_author(); ?> <?php the_date(); ?></div>
							</div>
						<?php endwhile;
					  wp_reset_postdata();
						?>
						<a href="/category/hrlr-online/">See more</a>
					</div>
				</div>
			</div><!-- #online posts -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
