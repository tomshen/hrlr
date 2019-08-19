<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HRLR
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>


			<div class="entry-content">
					<div> <?php the_title(); ?></div>
					<div> <?php echo get_field('author_name'); ?></div>
					<div> <?php echo get_field('author_bio'); ?></div>
					<div> <?php echo get_field('volume')->name; ?></div>
					<div> <?php echo get_field('issue')->name; ?></div>
					<div>PDF:  <?php echo get_field('pdf'); ?></div>
			</div>

			<?php get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>
