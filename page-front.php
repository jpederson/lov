<?php

/*
Template Name: Page - Home
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="about group">
		<div class="wrap text-center">
			<h2>About Living Our Visions</h2>
			<div class="three-fifth">
				<?php 
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); 
						the_content();
					endwhile;
				endif;
				?>
				<p class="buttons"><a href="/about" class="button">Read more...</a></p>
			</div>
			<div class="two-fifth">
				<p>MEET THE TEAM</p>
				<img src="<?php bloginfo( 'template_url' ) ?>/img/team-arrows.png" class="team-arrows">
				<div class="people group">
					<div class="person half">
						<img src="<?php bloginfo( 'template_url' ) ?>/img/photo-stefanie.jpg">
						<h4>Stefanie Primm</h4>
						<p>Community Organizer</p>
					</div>
					<div class="person half">
						<img src="<?php bloginfo( 'template_url' ) ?>/img/photo-amanda.jpg">
						<h4>Amanda Bell</h4>
						<p>Community Organizer</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="events group">
		<div class="wrap content-wide">
			<img src="<?php bloginfo('template_url') ?>/img/header-events.png">
			<div class="home-event-list">
				<?php 
				$events = get_upcoming_events( 3 );

				// loop through events
				if ( !empty( $events ) ) {
					echo '<ul>';
					foreach ( $events as $event ) {
						$thumb = get_the_post_thumbnail( $event );
						echo '<li class="event third"><a href="/event/' . $event->post_name . '">' . $thumb . '<h3>' . $event->post_title . '</h3></a><p>' . date( 'n/j/Y \a\t g:ia', $event->_p_event_start ) . '</p><p><a href="/event/' . $event->post_name . '" class="button">Register</a></p></li>';
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

	<div class="posts group">
		<div class="wrap">
			<div class="third">
				<img src="<?php bloginfo('template_url') ?>/img/header-news.png">
				<div class="group">
					<?php 
					$args = array(
						'cat' => "-3",
						'posts_per_page' => 3
					);

					// The Query
					$the_query = null;
					$the_query = new WP_Query( $args );

					// The Loop
					if ( $the_query->have_posts() ) {
						echo '<ul>';
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							echo '<li><a href="' . get_the_permalink() . '">' . get_the_post_thumbnail() . '<h4>' . get_the_title() . '</h4></a><div class="post-date">' . get_the_date() . '</div></li>';
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
			<div class="two-third">
				<img src="<?php bloginfo('template_url') ?>/img/header-featured-blog.png">
				<div class="group">
					<?php 
					$args = array(
						'category__in' => array( 3 ),
						'posts_per_page' => 1
					);

					// The Query
					$the_query = null;
					$the_query = new WP_Query( $args );

					// The Loop
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							echo '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail() . '<h4>' . get_the_title() . '</h4></a><div class="post-date">' . get_the_date() . '</div><div class="post-excerpt">' . get_the_excerpt() . '</div>';
						}
					} else {
						// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>

<?php 

get_footer();

?>