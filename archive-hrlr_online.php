<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HRLR
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

      <?php
      $years = array_reverse(range(2016, date('Y')));
      $months = array_reverse(range(1, 12));
			$months_names = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

      foreach ($years as $year) {
        foreach ($months as $month) {
          $args = [
              'post_type' => 'hrlr_online',
              'nopaging' => true,
							'order' => 'DESC',
							'year' => $year,
							'monthnum' => $month,
          ];
          $loop = new WP_Query($args);
					if($loop->have_posts()) { ?>
		         <h2 class="hrlr-online-headline-large"> <?php echo $months_names[$month-1] ?> <?php echo $year ?> </h2>
					<?php }
          while ($loop->have_posts()) {
              $loop->the_post(); ?>
              <div class="meta-info secondary-text">
                  <div> <?php echo get_field('author_name'); ?></div>
									<div> <?php echo the_date("j F Y"); ?></div>
              </div>

              <div class="post-info secondary-text">
                  <h3 class="hrlr-online-headline-small"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
									<div class="mobile-meta-info"> <?php echo get_field('author_name'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo get_the_date("j F Y");?></div>
									<div> <?php echo the_excerpt(); ?></div>
              </div>
              <?php
          }
          wp_reset_postdata();
        }
      } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
