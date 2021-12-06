<?php $background = get_sub_field('background_options');
$other_options = get_sub_field('other_options');?>
	<section class="positions <?= (!empty($other_options) && $other_options['custom_css_class']!='')?$other_options['custom_css_class']:'';?>"
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
		
					<div class="positions-container block-container">
						<div class="positions-wrapper wrapper-row">
							<?php 
								$heading = get_sub_field('heading');
								$content = get_sub_field('content');
								
								if($heading != ''):?>
									<h2 style="<?= !empty($other_options['heading_color']['theme_colors'])?'color:'.$other_options['heading_color']['theme_colors'].';':'';?>" class="section-title"><?= $heading;?></h2>
								<?php endif;
								
								if($content != ''):?>
									<div style="<?= !empty($other_options['text_color']['theme_colors'])?'color:'.$other_options['text_color']['theme_colors'].';':'';?>">
										<?= $content;?>
									</div>
							<?php endif;?>
							
							<?php $positions = new WP_Query([
								'post_type' => 'open_position',
								'posts_per_page' => -1,
								'post_status' => 'publish',
							]);
							
							if($positions->have_posts()):?>
								<div class="positions-list">
									<?php while($positions->have_posts()): $positions->the_post();?>
										<div class="positions-item">
											<div class="positions-item-top">
												<div class="positions-item-title">
													<?php 
													$position_name = get_the_title();
													$position_location = get_field('location', get_the_ID());

													if(!empty($position_name)):?>
														<h3 class="positions-item-name">
															<?= $position_name?>
														</h3>
													<?php endif;

													if(!empty($position_location)):?>
														<p class="positions-location">
															<?= $position_location?>
														</p>
													<?php endif;?>
												</div>
												<button type="button" class="btn-open positions-open">
													<svg data-name="+" xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38">
													  <path id="Path_2888" data-name="Path 2888" d="M19,0A19,19,0,1,1,0,19,19,19,0,0,1,19,0Z"/>
													  <line id="Line_85" class="line-rotate" data-name="Line 85" x2="18" transform="translate(19.5 10.578) rotate(90)" fill="none" stroke="#fafafa" stroke-linecap="round" stroke-width="3"/>
													  <line id="Line_86" data-name="Line 86" x2="18" transform="translate(10.5 19.578)" fill="none" stroke="#fafafa" stroke-linecap="round" stroke-width="3"/>
													</svg>
												</button>
											</div>
											<div class="positions-item-content">
												<?php $content=get_the_content();
												
												if($content != ''):?>
													<div class="positions-item-text">
														<?= $content?>
													</div>
												<?php endif;?>
												
												<a href="mailto:<?=get_sub_field('email');?>" class="btn main-btn"><span>SUBMIT APPLICATION</span></a>
											</div>
										</div>
									<?php endwhile;?>
								</div>
							<?php endif;?>
						</div>
					</div>
				</section>
