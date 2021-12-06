<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Glycomine
 */

if( have_rows('content_blocks') ):
    while ( have_rows('content_blocks') ) : the_row();

	get_template_part("modules/module", get_row_layout());?>

<?php endwhile;
endif;?>


