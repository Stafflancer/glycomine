<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Glycomine
 */

get_header('', ["header_class"=>'scroll-header']);
?>

	<main id="primary" class="site-main">
		<section class="post">
			<?php	
			$post_type = get_post_type();?>
				<div class="post-back main-container">
					<a href="<?= get_post_type_archive_link($post_type); ?>">< BACK TO ALL NEWS & EVENTS</a>
				</div>
			<div class="post-container">
				<div class="post-wrapper">
					<?php 
					
					get_template_part( 'template-parts/content', $post_type.'_single' );?>
				</div>
			</div>
			<div class="post-pagination main-container">
				<?php the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( '< BACK', 'glycomine' ) . '</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'NEXT >', 'glycomine' ) . '</span>',
					)
				);?>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
