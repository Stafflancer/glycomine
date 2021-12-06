<?php $background = get_sub_field('background_options');
$other_options = get_sub_field('other_options');?>
<section 
		 class="our-team <?= (!empty($other_options) && $other_options['custom_css_class']!='')?$other_options['custom_css_class']:'';?>"
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
	<div class="our-team-container main-container">
		<div class="our-team-wrapper">
			<?php $heading = get_sub_field('heading');
			
			if($heading != ''):?>
				<h4 style="<?= !empty($other_options['heading_color']['theme_colors'])?'color:'.$other_options['heading_color']['theme_colors'].';':'';?>">
					<?= $heading?>
				</h4>
			<?php endif;
			
			$team_members = new WP_Query([
				'post_type' => 'team_member',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'tax_query' => [
					'relation' => 'AND',
						[
							'taxonomy' => 'team_type',
							'field' => 'slug',
							'terms' => 'leadership'
						]
					]
				]);
					
			if($team_members->have_posts()):?>
			<div class="our-team-slider">
				<?php $slider_button = get_sub_field('slider_buttons');?>
				<div class="our-team-slider-prev our-team-slider-button swiper-button-prev">
					<img src="<?= $slider_button;?>" alt="Previous Member" />
				</div>
				<div class="swiper-1">
					<div class="swiper-wrapper">
						<?php 
						while($team_members->have_posts()): $team_members->the_post();?>
							<div class="swiper-slide">
								<img src="<?= get_field('photo_of_member', get_the_ID());?>" width="200" height="200" alt="<?= the_title();?>">
								<h5>
									<?= the_title();?>
								</h5>
								<p>
									<?= get_field('position_in_company', get_the_ID());?>
								</p>
							</div>
						<?php endwhile;?>
					</div>
				</div>
				<div class="our-team-slider-next our-team-slider-button swiper-button-next">
					<img src="<?= $slider_button;?>" alt="Next Member" />
				</div>
			</div>
			<?php endif;
			wp_reset_postdata();
			wp_reset_query();
			
			$button = get_sub_field('button');
			if((is_array($button) || $button != "") && !empty($button)):
			$button_color = get_sub_field('button_color');?>
				<a href="<?= $button['url'];?>" class="main-btn btn" style="background-color: <?=$button_color['theme_colors'];?>;">
					<span><?= $button['title'];?></span>
				</a>
			<?php endif;?>
		</div>
	</div>
</section>