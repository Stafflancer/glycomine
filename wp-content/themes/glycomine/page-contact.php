<?php /* Template Name: Contact Us Page */ 

get_header();
?>

	<main id="primary" class="site-main">
		<?php get_template_part( 'template-parts/content', get_post_type() );?>
			
		<section class="contact">
			<div class="contact-container main-container">
				<div class="contact-wrapper wrapper-row">
					<?php 
					$address = get_field('address');
					$contact_info = get_field('contact_info');
					
					if(!empty($address) || !empty($contact_info)):?>
						<div class="contact-content">
							<?php if($address['title'] != ''):?>
								<h2>
									<?= $address['title']?>
								</h2>
							<?php endif;?>
							<div class="contact-address">
								<?php if($address['address_line_1'] != ''):?>
									<p class="contact-address-1">
										<?= $address['address_line_1']?>
									</p>
								<?php endif;?>
								<?php if($address['address_line_2'] != ''):?>
									<p class="contact-address-2">
										<?= $address['address_line_2']?>
									</p>
								<?php endif;?>
							</div>
							<?php if(!empty($contact_info)):?>
								<div class="contact-contact-info">
									<?php if($contact_info['email'] != ''):?>
										<a href="mailto:<?= $contact_info['email'];?>" class="contact-email">
											<?= $contact_info['email'];?>
										</a>
									<?php endif;?>
									<?php if($contact_info['phone'] != ''):?>
										<a href="tel:<?= $contact_info['phone'];?>" class="contact-phone">
											<?= $contact_info['phone'];?>
										</a>
									<?php endif;?>
								</div>
							<?php endif;?>
						</div>
					<?php endif;
					
					$form = get_field('form');
					if(!empty($form)):?>
						<div class="contact-write-us">
							<?php if(!empty($form['heading'])):?>
								<h5 class="form-name">
									<?= $form['heading']?>
								</h5>
							<?php endif;?>
							<?php if(!empty($form['content'])):?>
								<div class="form-content">
									<?= $form['content']?>
								</div>
							<?php endif;?>
							<?php if(!empty($form['form'])):?>
								<div class="form-form">
									<?= do_shortcode('[gravityform id="'.$form['form'].'" title="false" description="false"]');?>
								</div>
							<?php endif;?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</section>
		<?php if(!empty($address['map_image'])):?>
			<section class="contact-map">
				<a href="<?=($address['google_maps_link']!='')?$address['google_maps_link']:'#';?>" target="_blank">
					<img src="<?= $address['map_image']?>" alt="Google map">
				</a>
			</section>
		<?php endif;?>
	</main><!-- #main -->

<?php
get_footer();
