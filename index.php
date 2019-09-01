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
			<div class="hrlr-posts-container">
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
						'order' => 'DESC',
				) );

				$volume = $volumes[0] ?>
				<h2 class="hrlr-headline-large hrlr-post-title"> Vol. <?php echo $volume->slug ?> <span class="hrlr-post-year">(<?php echo get_field('start_year', $volume) ?>-<?php echo substr(strval(get_field('start_year', $volume)+1), -2) ?>) </span></h2>
				<?php foreach ($issues as $issue) { ?>
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
						if($loop->have_posts()) { ?>
							<h3 class="hrlr-headline-small"> No. <?php echo get_field('issue_number', $issue) ?> <span class="hrlr-post-volume-number"><?php echo get_field('season', $issue) ?>
							<?php $issue_year =  get_field('start_year', $volume);
										if (get_field('issue_number', $issue) == 3) $issue_year++;
										echo $issue_year;
										?></span>
						 </h3>

							<?php while ($loop->have_posts()) {
									$loop->the_post();
									?>
									<div class="homepage-entry-content">
											<h4 class="hrlr-headline-small"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h4>
											<div class="secondary-text"> <?php echo get_field('author_name'); ?></div>
									</div>
									<?php
							}
						  wp_reset_postdata();
							break;
						} else {
							wp_reset_postdata();
						}
					} ?>
				<a class="secondary-text button forwards" href="/hrlr/">See more</a>
			</div><!-- #hrlr posts -->

			<div class="hrlr-online-posts-container">
					<h2 class="online-posts-header-volume hrlr-online-headline-large">HRLR Online</h2>
					<?php
					$args = [
							'post_type' => 'hrlr_online',
							'posts_per_page' => 3,
							'order' => 'DESC',
							'orderby' => 'date',
					];
					$loop = new WP_Query($args);
					while ($loop->have_posts()) {
								$loop->the_post(); ?>
								<div class="homepage-entry-content secondary-text">
										<h4 class="hrlr-online-headline-small"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h4>
										<div> <?php echo get_field('author_name'); ?></div>
										<div> <?php echo the_date("j F Y"); ?></div>
										<div> <?php echo the_excerpt(); ?></div>
								</div>
								<?php
						}
						wp_reset_postdata();
				?>
					<a class="secondary-text button forwards" href="/hrlr-online/">See more</a>
				</div>
			</div><!-- #online posts -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
