<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glycomine
 */

?>
<footer
				style="background-color: <?= get_field('footer_color', 'option'); ?>"
			>
				<div class="footer-container main-container">
					<div class="footer-wrapper wrapper-row">
						<div class="footer-left">
							<?php
							$logo = get_field('logotype', 'option');
							if( count($logo) ):?>
								<div class="footer-logo logo">
									<img src="<?php echo $logo['logotype_image']?>" alt="Glycomine" />
								</div>
							<?php endif;?>
							<?php $copyright = get_field('copyright', 'option');
							$copyright_links = $copyright["links"];?>
							<div class="footer-copyright">
								© 2020 <?= $copyright["copyright_text"];?> 
								<?php foreach($copyright_links as $copyright_link):?>
								| 	<a href="<?= $copyright_link['link']['url'];?>"><?= $copyright_link['link']['title'];?></a>
								<?php endforeach;?>
							</div>
						</div>
						<div class="footer-right">
							<?= do_shortcode('[gravityform id="1" title="false" description="false"]');?>
							
							<?php $social_networks = get_field('social_media', 'option');
							if(count($social_networks)):?>
							<ul class="footer-social-networks">
								<?php foreach($social_networks as $social_network):?>
								<li class="footer-social-network">
									<a href="<?= $social_network['social_network_link']['url'];?>" class="footer-social-link"
										><img src="<?= $social_network['social_network_icon'];?>" alt="<?= $social_network['social_network_link']['title'];?>"
									/></a>
								</li>
								<?php endforeach;?>
							</ul>
							<?php endif;?>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?php wp_footer();?>
	</body>
</html>

