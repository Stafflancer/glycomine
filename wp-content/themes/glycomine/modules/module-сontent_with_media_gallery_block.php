<?php $background = get_sub_field('background_options');
$media_position = get_sub_field('media_initial_position');
$other_options = get_sub_field('other_options');?>
<section
	class="therapies <?= $media_position;?> <?= (!empty($other_options) && $other_options['custom_css_class']!='')?$other_options['custom_css_class']:'';?>"
	id="<?= (!empty($other_options) && $other_options['custom_id']!='')?$other_options['custom_id']:'';?>"
			style= 
		 "<?=($background['image'] && $background['media_type'] == 'image')?'background-image: url('.wp_get_attachment_url($background['image']).');':'';?>
		  <?=($background['color']['theme_colors'] != '' && $background['media_type'] == 'color')?'background-color: '.$background['color']['theme_colors'].';':'';?>">
	
	<?php if($background['media_type'] == 'video' && !empty($background['video_mp4'])):?>
				<div class="video-background">
					<video width="<?= $background['video_mp4']['width'];?>" height="<?= $background['video_mp4']['height'];?>" autoplay muted loop>
				  		<source src="<?= $background['video_mp4']['url'];?>" type="<?= $background['video_mp4']['mime_type'];?>">
						<?php if(!empty($background['video_webm'])):?>
							<source src="<?= $background['video_webm']['url'];?>" type="<?= $background['video_webm']['mime_type'];?>">
						<?php endif;?>
					</video>
				</div>
			<?php endif;?>
        
			<?php if($background['add_overlay']):?>
				<div class="background-overlay"
					 style="background-color: <?= $background['overlay_color']['theme_colors'];?>">
					
				</div>
			<?php endif;?>
	
			<?php if($background['add_watermark']):?>
				<div class="background-watermark">
					<img src="<?= wp_get_attachment_url(467);?>" width="567" height="538">
				</div>
			<?php endif;?>
	
					<div class="therapies-container block-container">
						<div class="therapies-wrapper wrapper-row">
							<?php $content = get_sub_field('content');?>
							<div class="therapies-content">
								<?php 
								$content = get_sub_field('content');
								$heading = $content['heading'];
								$text = $content['content'];
								$button = $content['button'];
								
								if($heading != ''):?>
									<h2 style="<?= !empty($other_options['heading_color']['theme_colors'])?'color:'.$other_options['heading_color']['theme_colors'].';':'';?>"><?= $heading;?></h2>
								<?php endif;
								
								if($text != ''):?>
								<div style="<?= !empty($other_options['text_color']['theme_colors'])?'color:'.$other_options['text_color']['theme_colors'].';':'';?>">
									<?= $text;?>
								</div>
								<?php endif;?>
								
								<?php if((is_array($button) || $button != "") && !empty($button)):
									$button_color = $content['button_color'];?>
									<a href="<?= $button['url'];?>" class="main-btn-blue btn" style="background-color: <?=$button_color['theme_colors'];?>">
										<span><?= $button['title'];?></span>
									</a>
								<?php endif;?>
							</div>
							<?php 
							$media = get_sub_field('media');
							$slider_images = $media['slider_images'];
							
							if(count($slider_images)):
								$slider_button = get_sub_field('slider_button');?>
								<div class="therapies-images">
									<div class="therapies-slider swiper">
										<div class="therapies-slider-wrapper swiper-wrapper">
											<?php foreach($slider_images as $slider_image_id):?>
													<div class="swiper-slide">
														<img
															src="<?= wp_get_attachment_url($slider_image_id)?>"
															alt="<?= $heading;?>"
															width="675"
															height="525"
														/>
													</div>
											<?php endforeach;?>
										</div>
									</div>
									<?php $slider_button = get_sub_field('slider_button');?>
									<div class="therapies-slider-prev therapies-slider-button swiper-button-prev">
										<img src="<?= wp_get_attachment_url($slider_button);?>" alt="Previous image" width="83" height="83"/>
									</div>
									<div class="therapies-slider-next therapies-slider-button swiper-button-next">
										<img src="<?= wp_get_attachment_url($slider_button);?>" alt="Next image" width="83" height="83"/>
									</div>
								</div>
							<?php endif;?>
						</div>
					</div>
				</section>