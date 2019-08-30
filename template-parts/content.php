<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HRLR
 */

?>

<?php $extraClass = "" ?>
<?php if ( 'hrlr_online' === get_post_type() or 'hrlr' === get_post_type() ) :
 	if(get_field("abstract_only")) :
		$extraClass = "abstract-only";
	endif;
endif; ?>



<article id="post-<?php the_ID(); ?>" <?php post_class($extraClass); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title headline-large">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title headline-large"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
				<?php
				hrlr_posted_on();
				hrlr_posted_by();
				?>
		<?php endif;

		if ( 'hrlr' === get_post_type() ) :
			?>
				<div class="hrlr-online-headline-small hrlr-issue-number"> Issue <?php echo get_field('volume')->name; ?>.<?php echo get_field('issue')->slug; ?></div>
				<a class="button download-button downwards" href="<?php echo get_field('pdf'); ?>">Download the PDF</a>
		<?php endif;

		if ( 'hrlr_online' === get_post_type() ) :
			?>
				<div class="hrlr-online-headline-small hrlr-online-issue">
					HRLR Online
				</div>
				<div class="hrlr-online-headline-small hrlr-online-date"> <?php echo the_date("F j, Y"); ?></div>
				<a class="button download-button downwards" href="<?php echo get_field('pdf'); ?>">Download the PDF</a>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php hrlr_post_thumbnail(); ?>

	<div class="entry-content post-entry-content">

		<?php if ( 'hrlr_online' === get_post_type() or 'hrlr' === get_post_type() ) :	?>
			<div class="secondary-text author-bio"> <?php echo get_field('author_bio'); ?></div>
		<?php endif;  ?>
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
		) ); ?>

		<?php if ( 'hrlr_online' === get_post_type() or 'hrlr' === get_post_type() ) :
		 	if(get_field("abstract_only")) : ?>
				<a class="button download-button downwards secondary-download-button" href="<?php echo get_field('pdf'); ?>">Download the PDF</a>
			<?php endif;
		endif;

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
