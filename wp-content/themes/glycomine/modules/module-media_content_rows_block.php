<?php $background = get_sub_field('background_options');
$media_position = get_sub_field('media_initial_position');
$other_options = get_sub_field('other_options');?>
	<section class="common-text <?=$media_position;?> <?= (!empty($other_options) && $other_options['custom_css_class']!='')?$other_options['custom_css_class']:'';?>"
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
		
					<div class="common-text-container block-container">
						<div class="common-text-wrapper wrapper-row">
							<?php $media = get_sub_field('media');
							if($media):?>
								<div class="common-text-image <?=$media_position;?>">
									<img src="<?= $media['side_image'];?>" alt="<?= get_sub_field('heading');?>" width="826" height="924">
								</div>
							<?php endif;?>
							<div class="common-text-content">
								<?php 
								$heading = get_sub_field('heading');
								$content = get_sub_field('content');
								$button = get_sub_field('section_button');
								
								if($heading != ''):?>
									<h2 style="<?= !empty($other_options['heading_color']['theme_colors'])?'color:'.$other_options['heading_color']['theme_colors'].';':'';?>"><?= $heading;?></h2>
								<?php endif;
								
								if($content != ''):?>
								<div style="<?= !empty($other_options['text_color']['theme_colors'])?'color:'.$other_options['text_color']['theme_colors'].';':'';?>">
									<?= $content;?>
								</div>
								<?php endif;
								
								if((is_array($button) || $button != "") && !empty($button)):
									$button_color = get_sub_field('section_button_color');?>
									<a href="<?= $button['url'];?>" class="main-btn-green btn" style="background-color: <?=$button_color['theme_colors'];?>;">
										<span><?= $button['title'];?></span>
									</a>
								<?php endif;?>
							</div>
						</div>
					</div>
				</section>