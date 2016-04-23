<?php

/*
Template Name: Page - Home
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="about">
		<div class="wrap content-wide">
			<?php 
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); 
					the_content();
				endwhile;
			endif;
			?>
		</div>
	</div>

	<div class="events">
		<div class="wrap content-wide">
			<img src="<?php bloginfo('template_url') ?>/img/header-events.png">
			<?php 

			?>
		</div>
	</div>

	<div class="posts">
		<div class="wrap">
			<div class="third">
				<img src="<?php bloginfo('template_url') ?>/img/header-news.png">
				<?php 
				$args = array(
					'cat' => '-3',
					'posts_per_page' => 3
				);

				// The Query
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) {
					echo '<ul>';
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						echo '<li>' . get_the_title() . '</li>';
					}
					echo '</ul>';
				} else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				?>
			</div>
			<div class="two-third">
				<img src="<?php bloginfo('template_url') ?>/img/header-featured-blog.png">
				<?php 
				$args = array(
					'cat' => '-3',
					'posts_per_page' => 1
				);

				// The Query
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) {
					echo '<ul>';
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						echo '<li><a href="' . get_the_permalink() . '">' . get_the_post_thumbnail_url() . get_the_title() . '</a></li>';
					}
					echo '</ul>';
				} else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

<?php 

get_footer();

?>