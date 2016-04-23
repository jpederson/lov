<?php

get_header();

?>

	<?php the_large_title(); ?>

	<?php the_showcase(); ?>
	
	<?php if ( has_cmb_value( 'left_content' ) ) { ?>
	<div id="content" class="wrap group content-wide" role="main">
	<?php } ?>
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		?>
		<?php if ( has_cmb_value( 'left_content' ) ) { ?>
		</div>
<?php } ?>
	</div><!-- #content -->

<?php

get_footer();

?>