<?php $post = get_post();?>
<div class="post-top">
	<h2>
		<?= $post->post_title;?>		
	</h2>
	<p class="post-date"> 
		<?= get_the_date('F j, Y');?>
	</p>
</div>
<?php if($post->post_content != ''):?>
	<div class="post-content">
		<?php echo $post->post_content;?>
	</div>
<?php endif;

wp_reset_postdata();?>
