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
				<div class="hrlr-online-headline-small hrlr-issue-number"><a href="/hrlr"> Issue <?php echo get_field('volume')->name; ?>.<?php echo get_field('issue')->slug; ?></a></div>
				<a class="button download-button downwards" href="<?php echo get_field('pdf'); ?>">Download the PDF</a>
		<?php endif;

		if ( 'hrlr_online' === get_post_type() ) :
			?>
				<div class="hrlr-online-headline-small hrlr-online-issue">
					<a href="/hrlr-online">HRLR Online</a>
          <span class="hrlr-online-headline-small hrlr-online-date"> <?php echo the_date("F j, Y"); ?></span>
				</div>

				<a class="button download-button downwards" href="<?php echo get_field('pdf'); ?>">Download the PDF</a>
		<?php endif;

		if ( 'news' === get_post_type() ) :
			?>
				<div class="secondary-text news-date"> <?php echo the_date("F j, Y"); ?></div>
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
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->


<?php if ( 'hrlr_online' === get_post_type() and get_field("abstract_only") ) : ?>
  <div class="post-recirc hrlr-online-post-recirc">

          <?php
          $args = [
              'post_type' => 'hrlr_online',
              'posts_per_page' => '3',
              'order' => 'DESC',
          ];
          $loop = new WP_Query($args);
					if($loop->have_posts()) { ?>
		         <h2 class="hrlr-online-headline-large"> More HRLR Online</h2>
					<?php }
          while ($loop->have_posts()) {
              $loop->the_post(); ?>
              <div class="entry-content">
								<div class="meta-info secondary-text">
                  <div> <?php echo get_field('author_name'); ?></div>
									<div> <?php echo the_date("j F Y"); ?></div>
              	</div>

              	<div class="post-info secondary-text">
                  <h3 class="hrlr-online-headline-small"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
									<div class="mobile-meta-info"> <?php echo get_field('author_name'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo get_the_date("j F Y");?></div>
									<div> <?php echo the_excerpt(); ?></div>
              	</div>
							</div>
              <?php
          }
          wp_reset_postdata();
      ?>
      <a class="secondary-text button forwards" href="/hrlr-online/">See all</a>

  </div>
<?php endif; ?>


<?php if ( 'hrlr' === get_post_type() and get_field("abstract_only") ) : ?>
  <div class="post-recirc hrlr-post-recirc">

      <h2 class="hrlr-headline-large"> More H.R.L.R.</h2>
        <?php
        $args = [
            'post_type' => 'hrlr',
            'posts_per_page' => '3',
            'order' => 'desc',
        ];
        $loop = new WP_Query($args);
        while ($loop->have_posts()) {
            $loop->the_post();
            ?>
            <div class="entry-content">
                <h4 class="hrlr-headline-small"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h4>
                <div class="secondary-text"> <?php echo get_field('author_name'); ?></div>
            </div>
            <?php
        }

        wp_reset_postdata();
        ?>

      	<a class="secondary-text button forwards" href="/hrlr/">See all</a>
  </div>
<?php endif; ?>
