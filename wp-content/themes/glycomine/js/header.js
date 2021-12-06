let headerBlock = document.getElementById("masthead");
window.onscroll = function () {
	if (window.scrollY > 0 || firstBlock.length === 0) {
		headerBlock.classList.add("scroll");
	} else {
		headerBlock.classList.remove("scroll");
	}
};

let firstBlock = document.querySelector('section.hero-common');
if (firstBlock.length === 0) {
		headerBlock.classList.add("scroll");
}

jQuery(function($){
	if(window.outerWidth < 1024){
		const headerLinks = $("#menu-main-menu > li > a");
		
		if(headerLinks.length){
			headerLinks.click(function(event){
				const subMenu = $(event.target).siblings('.sub-menu');
				const parentLink =  $(event.target).parents('li');
				if(subMenu.length && !$(event.target).hasClass('one')){
					event.preventDefault();
					$(event.target).addClass('one');
				}else{
					window.location.href = $(event.target).attr('href');
				}
			});
			$(document).click(function(event){
				if(!$(event.target).hasClass('one')){
					console.log($(event.target));
					$("#menu-main-menu > li > a").removeClass('one');
				}
			});
		}
	}
	const headerBurgerMenu = $('#header-burger-menu');
	if(headerBurgerMenu.is(':visible')){
		headerBurgerMenu.click(function(){
			$('#masthead #menu-holder').toggleClass('open');
		});	
	}
	
	$(document).ready(function(){
		const heroButtons = $("#hero-button-down");
		if(heroButtons.length){
			heroButtons.click(function(){
				$('.hero-banner-down + section')[0].scrollIntoView({block: "center", behavior: "smooth"});
			});
		}
	});
});
