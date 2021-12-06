<?php $background = get_sub_field('background_options');
$other_options = get_sub_field('other_options');?>
<section class="members-team member-team <?= (!empty($other_options) && $other_options['custom_css_class']!='')?$other_options['custom_css_class']:'';?>"
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
	
	<div class="members-team-container block-container">
		<div class="members-team-wrapper wrapper-column-center">
			<?php 
				$heading = get_sub_field('heading');
				$content = get_sub_field('content');
			if($heading != ''):?>
				<h4 style="<?= !empty($other_options['heading_color']['theme_colors'])?'color:'.$other_options['heading_color']['theme_colors'].';':'';?>"><?= $heading;?></h4>
			<?php endif;
			
			if($content != ''):?>
				<div style="<?= !empty($other_options['text_color']['theme_colors'])?'color:'.$other_options['text_color']['theme_colors'].';':'';?>">
					<?= $content;?>
				</div>
			<?php endif;
			
			$taxonomy = get_sub_field('taxonomy');
			$members = new WP_Query([
				'post_type' => 'team_member',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'tax_query' => [
					'relation' => 'AND',
						[
							'taxonomy' => 'team_type',
							'field' => 'slug',
							'terms' => (!empty($taxonomy->slug)&&!empty($taxonomy))?$taxonomy->slug:'',
						]
					]
				]);

				if($members->have_posts()):?>
					<div class="members-team-list">
						<?php while($members->have_posts()): $members->the_post();?>
						<div class="members-team-item">
							<div class="member-team-button" data-id="<?= get_the_ID();?>">
								READ BIO
							</div>
							<?php $title = get_the_title();
							$position = get_field('position_in_company', get_the_ID());
							
							if(!empty($title)):?>
								<h5>
									<?= $title;?>
								</h5>
							<?php endif;
							
							if(!empty($position)):?>
								<p>
									<?= $position;?>
								</p>
							<?php endif;?>
						</div>
						<?php endwhile;?>
					</div>
					<div class="leadership-team-bio">
						<div class="leadership-team-bio-close">

						</div>
						<div class="leadership-team-avatar">
							<img width="202" height="202" src="" alt="" class="leadership-team-avatar-img">
							<ul class="leadership-team-social-networks">

							</ul>
						</div>
						<div class="leadership-team-info">
							<div class="leadership-team-member">
								<h2 class="leadership-team-name">

								</h2>
								<p class="leadership-team-position">

								</p>
							</div>
							<div class="leadership-team-content">

							</div>
						</div>
					</div>
			<?php endif;
				wp_reset_postdata();
				wp_reset_query();
			
				$button = get_sub_field('section_button');
				if((is_array($button) || $button != "") && !empty($button)):
				$button_color = get_sub_field('button_color');?>
					<a href="<?= $button['url'];?>" class="main-btn-green btn" style="<?= (!empty($button_color['theme_colors']))?'background-color:'.$button_color['theme_colors'].';':'';?>">
						<span><?= $button['title'];?></span>
					</a>
			<?php endif;?>
		</div>
	</div>
</section>