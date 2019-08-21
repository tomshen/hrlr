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

      <div class="publication-navigation">
				<div class="publication-navigation-item hrlr-headline-large">
					H. R. L. R.
				</div>
				<div class="publication-navigation-item hrlr-online-headline-large">
				  <a href="/hrlr-online/">HRLR Online</a>
				</div>
			</div>

      <?php
      $volumes = get_terms( array(
          'taxonomy' => 'volumes',
          'hide_empty' => false,
        	'orderby' => 'start_year',
        	'order' => 'DESC',
      ) );

      $issues = get_terms( array(
          'taxonomy' => 'issue',
          'hide_empty' => false,
        	'orderby' => 'issue_number',
        	'order' => 'ASC',
      ) );

      foreach ($volumes as $volume) {
        ?>
        <h2 class="hrlr-headline-large"> Vol. <?php echo $volume->slug ?> <?php echo get_field('start_year', $volume) ?>-<?php echo substr(strval(get_field('start_year', $volume)+1), -2) ?></h2>
        <?php foreach ($issues as $issue) { ?>
          <h3 class="hrlr-headline-small"> No. <?php echo get_field('issue_number', $issue) ?> <?php echo get_field('season', $issue) ?>

            <?php $issue_year =  get_field('start_year', $volume);
                  if (get_field('issue_number', $issue) == 3) $issue_year++;
                  echo $issue_year;
                  ?>
           </h3>
          <?php
          $args = [
              'post_type' => 'hrlr',
              'nopaging' => true,
              'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'volumes',
                    'field'    => 'slug',
                    'terms'    => $volume->slug,
                ),
                array(
                    'taxonomy' => 'issue',
                    'field'    => 'slug',
                    'terms'    => $issue->slug,
                ),
              ),
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
        }
      } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();