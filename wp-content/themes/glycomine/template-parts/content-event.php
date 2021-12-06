<?php 
if( have_rows('content_blocks') ):
	while ( have_rows('content_blocks') ) : the_row();
		get_template_part("modules/module", get_row_layout());
	endwhile;
endif;
?>
<section class="posts">
 	<div class="posts-container main-container">
	 	<div class="posts-wrapper archive-wrapper">
			<?php
			$filter=do_shortcode('[searchandfilter id="629"]');
			if(!empty($filter)):?>
				<div class="filter posts-filter">
					<?= $filter;?>
				</div>
			<?php
				endif;
			
				$current_page = !empty( $_GET['sf_paged'] ) ? $_GET['sf_paged'] : 1;
			
				$events = new WP_Query([
					'post_type' => 'event',
					'post_status' => 'publish',
					'search_filter_id' => 629,
					'posts_per_page' => 12,
					'paged' => $current_page,
				]);
			
				if($events->have_posts()):?>
					<div class="posts-list" id="posts">
						<?php while($events->have_posts()): $events->the_post();
							if(get_field('show_event')):
							$post_id = get_the_ID();
							$post_meta_data = get_post_meta($post_id);
						
							$event_type = get_the_terms($post_id, 'event-categories');?>
							<div class="posts-item event-item">
								<div class="posts-item-content">
									<?php if(!empty($event_type)):?>
										<div class="posts-top">
											<p>
												<?= $event_type[0]->name;?>
											</p>
										</div>
									<?php endif;?>
									<div class="posts-text">
										<div class="posts-item-date">
											<?= ($post_meta_data['_event_start_date'][0]!=$post_meta_data['_event_end_date'][0])?date('F j, Y', strtotime($post_meta_data['_event_start_date'][0]))." — ".date('F j, Y', strtotime($post_meta_data['_event_end_date'][0])): date('F j, Y', strtotime($post_meta_data['_event_start_date'][0]));?>
										</div>
										<?php 
										$location_fields = get_field('events_address');
										
										if(!empty($location_fields) && $location_fields['locations_type'] === 'physicial_event'):?>
											<div class="posts-location">
												<?php $location_data = $location_fields['physicial_event'];
												foreach($location_data as $value):
													if(!empty($value)):?>
														<p>
															<?= $value?>
														</p>
												<?php
													endif;
													endforeach;?>
											</div>
										<?php endif;?>
										<?php 
										$title = get_the_title();

										if(!empty($title)):?>
											<h5 class="posts-item-name">
												<?= get_the_title();?>	
											</h5>
										<?php endif;?>
									</div>
								</div>
								
								<?php
								$url = get_the_permalink();
								if(!empty($url)):?>
									<div class="posts-item-url">
										<a href="<?= $url;?>">
											<span>Learn More</span>
											<svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38">
											  <g id="Group_78532" data-name="Group 78532" transform="translate(-288.156 -377.289)">
												<circle id="Ellipse_209" data-name="Ellipse 209" cx="19" cy="19" r="19" transform="translate(288.157 377.289)" fill="#1d989f"/>
												<path id="Path_2941" data-name="Path 2941" d="M314.154,396.134a.548.548,0,0,0-.01-.069c0-.023-.007-.054-.012-.081s-.012-.052-.019-.078-.011-.046-.018-.069-.017-.05-.026-.075-.015-.045-.025-.068-.021-.046-.032-.069-.021-.046-.032-.068-.025-.044-.038-.065-.025-.044-.039-.065-.034-.048-.052-.071-.024-.034-.038-.051c-.032-.04-.065-.078-.1-.115l-5.966-6.025a1.521,1.521,0,0,0-2.15-.016l-.016.016a1.559,1.559,0,0,0,0,2.19l3.35,3.386H288.22c-.041.511-.063,1.027-.063,1.548s.022,1.04.063,1.552h20.711l-3.35,3.381a1.559,1.559,0,0,0,0,2.19,1.521,1.521,0,0,0,2.15.017l.016-.017,5.965-6.029a1.079,1.079,0,0,0,.1-.114c.014-.017.026-.035.039-.052s.035-.046.051-.07.026-.043.039-.065.026-.043.038-.065.022-.045.033-.068.022-.045.032-.069.016-.045.025-.068.018-.05.026-.075l.018-.069c.006-.026.014-.052.019-.078s.008-.054.012-.081.008-.046.01-.069c0-.051.008-.1.008-.153A.981.981,0,0,0,314.154,396.134Z" fill="#fff"/>
											  </g>
											</svg>
										</a>
									</div>
								<?php endif;?>
							</div>
						<?php endif; 
						endwhile;?>
						<?php $pagination = paginate_links([
							'prev_text'=>"<",
							'next_text'=>">",
							'base' => site_url() . '%_%',
							'format' => "?paged=%#%",
							'total' => $events->max_num_pages,
							'current' => $current_page,
							'mid_size' => 1,
							'end_size' => 0,
						]);

						if(!empty($pagination)):?>
							<div class="posts-list-pagination">
								<div>
									<?= $pagination;?>
								</div>
							</div>
						<?php endif;?>
					</div>
			<?php endif;?>
			<div class="posts-button">
				<a class="btn main-btn" href="<?= get_permalink(17);?>"><span>EXPLORE OUR NEWS ></span></a>
			</div>
		</div>
	</div>
</section>
<?php wp_reset_postdata();
wp_reset_query();?>