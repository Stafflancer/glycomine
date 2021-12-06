<?php $background = get_sub_field('background_options');
$other_options = get_sub_field('other_options');?>

<section 
		 class="pages <?= (!empty($other_options) && $other_options['custom_css_class']!='')?$other_options['custom_css_class']:'';?>"
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
					<div class="pages-container block-container">
						<div class="pages-wrapper wrapper-row">
							<?php if(have_rows('pages_links')):
							$count = 0;
							$cards_per_row = get_sub_field('cards_per_row');?>
							<div class="pages-links wrapper-row">								
								<?php while(have_rows('pages_links')): the_row();
								$page_name=get_sub_field('page_name');
								$page_description=get_sub_field('page_description');
								if($count == 0):?>
								<div class="pages-row">
								<?php $count++;
									endif;?>	
									<div class="pages-item">
										<div class="pages-content">
											<?php if($page_name != ''):?>
												<h3 style="<?= !empty($other_options['heading_color']['theme_colors'])?'color:'.$other_options['heading_color']['theme_colors'].';':'';?>"><?= $page_name;?></h3>
											<?php endif;
											
											if($page_description != ''):?>
											<div style="<?= !empty($other_options['text_color']['theme_colors'])?'color:'.$other_options['text_color']['theme_colors'].';':'';?>">
												<?= $page_description;?>
											</div>
											<?php endif;?>
										</div>
										<a href="<?= get_sub_field('page_link')?>">
											<span>LEARN MORE</span> 
											<svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38">
											  <g id="Group_78532" data-name="Group 78532" transform="translate(-288.156 -377.289)">
												<circle id="Ellipse_209" data-name="Ellipse 209" cx="19" cy="19" r="19" transform="translate(288.157 377.289)" fill="#1d989f"/>
												<path id="Path_2941" data-name="Path 2941" d="M314.154,396.134a.548.548,0,0,0-.01-.069c0-.023-.007-.054-.012-.081s-.012-.052-.019-.078-.011-.046-.018-.069-.017-.05-.026-.075-.015-.045-.025-.068-.021-.046-.032-.069-.021-.046-.032-.068-.025-.044-.038-.065-.025-.044-.039-.065-.034-.048-.052-.071-.024-.034-.038-.051c-.032-.04-.065-.078-.1-.115l-5.966-6.025a1.521,1.521,0,0,0-2.15-.016l-.016.016a1.559,1.559,0,0,0,0,2.19l3.35,3.386H288.22c-.041.511-.063,1.027-.063,1.548s.022,1.04.063,1.552h20.711l-3.35,3.381a1.559,1.559,0,0,0,0,2.19,1.521,1.521,0,0,0,2.15.017l.016-.017,5.965-6.029a1.079,1.079,0,0,0,.1-.114c.014-.017.026-.035.039-.052s.035-.046.051-.07.026-.043.039-.065.026-.043.038-.065.022-.045.033-.068.022-.045.032-.069.016-.045.025-.068.018-.05.026-.075l.018-.069c.006-.026.014-.052.019-.078s.008-.054.012-.081.008-.046.01-.069c0-.051.008-.1.008-.153A.981.981,0,0,0,314.154,396.134Z" fill="#fff"/>
											  </g>
											</svg>
										</a>
									</div>
								<?php if($count == $cards_per_row):?>
								</div>
								<?php $count=0;
									endif;?>	
								<?php endwhile;?>
								</div>
							<?php endif;?>
						</div>
					</div>
				</section>