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
        <h2 class="hrlr-headline-large <?php if($volume != $volumes[0]) echo "is-accordion is-closed "; ?>"> Vol. <?php echo $volume->slug ?> <span class="hrlr-post-year">(<?php echo get_field('start_year', $volume) ?>-<?php echo substr(strval(get_field('start_year', $volume)+1), -2) ?>)</span></h2>
				<div class="hrlr-volume-container submenu">
        <?php foreach ($issues as $issue) { ?>
					<h3 class="hrlr-headline-small"> No. <?php echo get_field('issue_number', $issue) ?> <span class="hrlr-post-volume-number"><?php echo get_field('season', $issue) ?>
					<?php $issue_year =  get_field('start_year', $volume);
								if (get_field('issue_number', $issue) == 3) $issue_year++;
								echo $issue_year;
								?></span>
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
                  <div class="secondary-text hrlr-post-author-name"> <?php echo get_field('author_name'); ?></div>
              </div>
              <?php
          }

          wp_reset_postdata();
        } ?>
			</div>
      <?php } ?>

			<div class="back-issues-note hrlr-headline-small">
				For inquiries into backdated issues, <a href="/about">reach out to us</a>. Archived issues are always available through LexisNexis and Westlaw.
			</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
