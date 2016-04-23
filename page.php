<?php

get_header();

?>

	<?php the_showcase(); ?>
	
	<div id="content" class="wrap group content-wide" role="main">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		?>
		</div>
	</div><!-- #content -->

<?php

get_footer();

?>