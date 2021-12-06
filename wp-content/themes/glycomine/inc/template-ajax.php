<?php

function get_member(){
	if(isset($_POST)){
		$member_data = get_post($_POST['member_id']);
		
		$response = [
			"member_bio" => $member_data->post_content,
			"member_name" => $member_data->post_title,
			"member_image_src" => get_field('photo_of_member', $_POST['member_id']),
			"member_position" => get_field('position_in_company', $_POST['member_id']),
			"member_social_networks" => get_field('social_networks', $_POST['member_id'])
		];
		
		echo json_encode($response);
	}
	die;
}

add_action( 'wp_ajax_get_member', 'get_member' );
add_action( 'wp_ajax_nopriv_get_member', 'get_member' );