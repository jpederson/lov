<?php

/*
Template Name: Page - Home
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="bg-teal bg-stripes">
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


<?php 

get_footer();

?>