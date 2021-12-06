<?php $background = get_sub_field('background_options');
$other_options = get_sub_field('other_options');?>
<section 
		 class="hero-banner <?= (!empty($other_options) && $other_options['custom_css_class']!='')?$other_options['custom_css_class']:'';?>"
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
	
					<div class="hero-banner-container main-container">
						<div class="hero-banner-wrapper wrapper">
							<div class="hero-banner-cta">
								<?php 
								$heading = get_sub_field('heading');
								$content = get_sub_field('content');
								$button = get_sub_field('button');
								
								if($heading != ""):?>
									<h1 style="<?= !empty($other_options['heading_color']['theme_colors'])?'color:'.$other_options['heading_color']['theme_colors'].';':'';?>"><?= $heading?></h1>
								<?php endif;
										
								if($content != ""):?>
								<div style="<?= !empty($other_options['text_color']['theme_colors'])?'color:'.$other_options['text_color']['theme_colors'].';':'';?>">
									<?= $content ?>
								</div>
								<?php endif;
	
								if((is_array($button) || $button != "") && !empty($button)):?>
									<a href="<?= $button['url'];?>" class="btn main-btn">
										<span><?= $button['title'];?></span>
									</a>
								<?php endif;?>
							</div>
							<?php $image_id = get_sub_field('side_image');
							
							if($image_id):?>
								<div class="hero-banner-images">
									<img src="<?= wp_get_attachment_url($image_id)?>" alt="<?= get_sub_field('heading');?>" 
										 sizes="(min-width: 320px) 320w,
												(min-width: 480px) 480w,
												(min-width: 640px) 640w,
												(min-width: 1024px) 1024w">
								</div>
							<?php endif;?>
						</div>
					</div>
				</section>
				<?php
					$down_button_image = get_sub_field('down_button_image');

					if(!empty($down_button_image)):?>
						<div class="hero-banner-down">
							<button id="hero-button-down" type="button">
								<img src="<?= wp_get_attachment_url($down_button_image)?>" alt="<?php __('Scroll down');?>" width="27" height="25"/>
							</button>
						</div>
					<?php endif;?>