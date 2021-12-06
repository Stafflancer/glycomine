jQuery(function($){
	const positionsOpenButtons = $(".positions-open");
	
	if(positionsOpenButtons.length){
		positionsOpenButtons.click(function(){
			const positionsParent = $(this).parents('.positions-item');
			
			positionsParent.toggleClass('active');
		});
	}
});