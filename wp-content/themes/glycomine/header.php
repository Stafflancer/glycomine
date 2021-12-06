<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glycomine
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=agu2ks3uiusx4zrxzkd14q" async="true"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header <?= $args['header_class'];?>">
				<div class="header-container main-container">
					<div class="header-wrapper">
						<div class="header-left">
						<?php
							$logo = get_field('logotype', 'option');
							if( count($logo) ):?>
								<div class="header-logo logo">
									<a href="<?= home_url();?>">
										<img src="<?php echo $logo['logotype_image']?>" alt="Glycomine" />
									</a>
								</div>
							<?php endif;?>
							<button class="header-burger-menu" id="header-burger-menu">
								<svg height="384pt" viewBox="0 -53 384 384" width="384pt" xmlns="http://www.w3.org/2000/svg">
									<path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path>
									<path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path>
									<path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path>
								</svg>
							</button>
						</div>
								
						<div class="menu-holder" id="menu-holder">
						<?php
							wp_nav_menu([
								'menu' => 'Main Menu',
								'container' => 'nav',
								'container_class' => 'main-navigation',
								"menu_class" => 'header-menu'
							]);?>
							<a href="<?= get_permalink(23);?>" class="main-btn-blue btn"><span>Contact</span></a>
						</div>
					</div>
				</div>
	</header>
