<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div id="primary" class="site-content">
	<div id="content" role="main">

		<h1 class="hrlr-online-headline-large"> News </h1>

		<?php while ( have_posts() ) : the_post(); ?>

			<h2 class="entry-title hrlr-online-headline-small"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<div class="entry-content secondary-text">
				<?php the_date() ?>
				<?php the_content(); ?>
			</div><!-- .entry-content -->

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
