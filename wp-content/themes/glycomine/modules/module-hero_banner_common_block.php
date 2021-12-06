<?php $background = get_sub_field('background_options');
$other_options = get_sub_field('other_options');?>
<section
		class="hero-common <?= (!empty($other_options) && $other_options['custom_css_class']!='')?$other_options['custom_css_class']:'';?>"
		id="<?= (!empty($other_options) && $other_options['custom_id']!='')?$other_options['custom_id']:'';?>"
		style= 
		 "<?=($background['image'] && $background['media_type'] == 'image')?'background-image: url('.wp_get_attachment_url($background['image']).');':'';?>
		  <?=($background['color']['theme_colors'] != '' && $background['media_type'] == 'color')?'background-color: '.$background['color']['theme_colors'].';':'';?>">
					<div class="hero-common-container main-container">
						<div class="hero-common-wrapper wrapper-row">
							<div class="hero-common-content">
								<?php 
								$subheading = get_sub_field('subheading');
								$heading = get_sub_field('heading');
								
								if($subheading != ''):?>
									<h4 style="<?= !empty($other_options['heading_color']['theme_colors'])?'color:'.$other_options['heading_color']['theme_colors'].';':'';?>">
										<?= get_sub_field('subheading');?>
									</h4>
								<?php endif;
								
								if($heading != ''):?>
									<h2 style="<?= !empty($other_options['heading_color']['theme_colors'])?'color:'.$other_options['heading_color']['theme_colors'].';':'';?>"><?= get_sub_field('heading');?></h2>
								<?php endif;?>
							</div>
							<?php $image_id = get_sub_field('side_image');
							
							if($image_id && get_sub_field('has_side_image')):?>
								<div class="hero-common-image"
									 style="background-image: url(<?=wp_get_attachment_url($image_id);?>);">
								</div>
							<?php endif;?>
						</div>
					</div>
				</section>