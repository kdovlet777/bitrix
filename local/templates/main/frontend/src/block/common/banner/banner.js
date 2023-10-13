import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/autoplay';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener("DOMContentLoaded", function() {
	new Swiper('.swiper', {
		modules: [Navigation, Pagination, Autoplay],
		speed: 400,
		direction: 'horizontal',
		loop: true,
		navigation: {
			nextEl: '.b-banner__swiper-button-next',
			prevEl: '.b-banner__swiper-button-prev',
		},

		pagination: {
			el: '.swiper-pagination',
		},

		autoplay: {
			delay: 5000,
		},
	});
});