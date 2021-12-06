import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js';

const swiper = new Swiper('.swiper', {
  	speed: 400,
	direction: 	'horizontal',
	slidesPerView: 'auto',
	spaceBetween: 30,
	
	navigation: {
    nextEl: '.therapies-images > .swiper-button-next',
    prevEl: '.therapies-images > .swiper-button-prev',
  },
});

const swiperOurTeam = new Swiper('.swiper-1', {
  	speed: 400,
	direction: 	'horizontal',
	slidesPerView: 3,
	spaceBetween: 30,
	
	navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
	
	breakpoints: {
		320: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
		},
		1210: {
			slidesPerView: 3,
		}
	}
});