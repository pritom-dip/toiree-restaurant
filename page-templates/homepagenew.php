<?php
/**
 * Template Name: Home Page New
 *
 **/
get_header();?>
	<div class="home-page container_custom" role="main">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
		?>
	</div><!-- #main-content -->
<?php get_footer();
