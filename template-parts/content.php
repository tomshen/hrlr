<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HRLR
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title headline-large">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title headline-large"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>

		<div class="entry-meta hrlr-online-headline-small"> <?php
		if ( 'post' === get_post_type() ) :
			?>
				<?php
				hrlr_posted_on();
				hrlr_posted_by();
				?>
		<?php endif;

		if ( 'hrlr' === get_post_type() ) :
			?>
				<div> Issue <?php echo get_field('volume')->name; ?>.<?php echo get_field('issue')->slug; ?></div>
				<div class="secondary-text"> <?php echo get_field('author_bio'); ?></div>
				<div class="secondary-text"> <a href="<?php echo get_field('pdf'); ?>">Download the PDF</a>  </div>
		<?php endif;

		if ( 'hrlr_online' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<div> HRLR Online </div>
				<div> <?php echo the_date("F j, Y"); ?></div>
				<div class="secondary-text"> <?php echo get_field('author_bio'); ?></div>
				<div class="secondary-text"> <a href="<?php echo get_field('pdf'); ?>">Download the PDF</a>  </div>
		<?php endif; ?>

	</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php hrlr_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hrlr' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hrlr' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hrlr_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
