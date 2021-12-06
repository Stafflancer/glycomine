<?php
	/*
	 * Template Name: Events Archive
	 */

get_header();
?>

	<main id="primary" class="site-main">
				<?php get_template_part( 'template-parts/content', 'event');?>
	</main><!-- #main -->

<?php
wp_reset_postdata();
wp_reset_query();
get_footer();