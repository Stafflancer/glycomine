jQuery(function($){
	$('.leadership-button-back, .member-team-button').click(function(){
		const idMember = $(this).data('id');
		const memberParent = $(this).parents('.member-team');
		
		const data = {
			'action': 'get_member',
			'member_id': idMember,
		}
		
		$.ajax({
			url: team_member_array.ajaxurl,
			type: 'POST', 
			data: data, 
			success: function(response){
				const dataArray = JSON.parse(response);
				if(Object.entries(dataArray).length !== 0){
					const memberBio = memberParent.find('.leadership-team-bio');
					
					if(dataArray['member_image_src']){
						const leadershipAvatar = memberBio.find('.leadership-team-avatar-img');
						leadershipAvatar.attr('src', dataArray['member_image_src']);
						leadershipAvatar.attr('alt', dataArray['member_name']);
					}
					
					memberBio.find('.leadership-team-name').text(dataArray['member_name']);
					memberBio.find('.leadership-team-position').text(dataArray['member_position']);
					memberBio.find('.leadership-team-content').empty();
					memberBio.find('.leadership-team-content').append(dataArray['member_bio']);
					
					memberBio.find('.leadership-team-social-networks').empty();
					if(dataArray['member_social_networks'].length > 0){
						dataArray['member_social_networks'].forEach((item) => $('.leadership-team-social-networks').append('<li><a href='+ item['social_network_link']+ '><img src='+item['social_network_icon']+' width="23" height="23"></a></li>'))
					}
					
					memberBio.addClass('show');
					
					let coordinates = memberBio[0].getBoundingClientRect();
					
					window.scrollTo({top: coordinates.top + window.pageYOffset - 200, behavior: "smooth"});
				}
			}
		})
	});
	
	$('.leadership-team-bio-close').click(function(){
		const memberBio = $(this).parents('.leadership-team-bio');
		memberBio.removeClass('show');
	});
});