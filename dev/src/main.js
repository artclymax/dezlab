//import 'jarallax/dist/jarallax.min.css';
import "@fancyapps/ui/dist/fancybox/fancybox.css";
import './scss/main.scss';
//!
import { Swiper } from "swiper/bundle";

//import { jarallax } from "jarallax";
import { Fancybox } from "@fancyapps/ui/dist/fancybox/";

import { AutoCalc } from "./js/AutoCalc.js";
import { Menu } from './js/Menu.js';
//import { RunningLine } from './js/RunningLine.js';
//import { BackdropList } from './js/BackdropList.js';
import { Modal } from './js/Modal.js';
import { cookies } from "./js/Cookies.js";
import { imask } from "./js/imask.js";
//import { fileBtn } from "./js/FileBtn.js";
//import { CustomFieldSelect } from "./js/CustomFieldSelect.js";
import { Spoiler } from './js/Spoiler.js';
//import { ScrollToTop } from './js/ScrollToTop.js';
import { MXSwiper } from './js/MXSwiper.js';
import { CustomSelect } from './js/CustomSelect.js';
import { Tabs } from './js/Tabs.js';

// FOR CONTACTS FORM 7
//import "./js/redirect-to-thanks-page.js";

new AutoCalc();
//new CustomFieldSelect();
new Menu({
	btn: '.burger-btn',
	menu: '.header-menu',
	activeClass: 'open-header-menu',
})


//new BackdropList();

new Modal();

//jarallax(document.querySelectorAll('.jarallax'), {
//	speed: 0.2,
//});

cookies();
imask();

Fancybox.bind("[data-fancybox]");

//new RunningLine();
//new ScrollToTop();

new Spoiler();

new MXSwiper();
new CustomSelect({
	selector: 'select'
});
/*
window.addEventListener('scroll', function () {
	const header = document.querySelector('.header');

	if (window.scrollY > 50) {
		header.classList.add('scrolled');
	} else {
		header.classList.remove('scrolled');
		const valueUnits = header.offsetHeight;
		document.querySelector(':root').style.setProperty(`--header-height`, valueUnits + 'px');
	}
});
*/
//fileBtn();


const categoryBtn = document?.querySelector('.dez-shop__category-btn');
categoryBtn?.addEventListener('click', () => {
	categoryBtn.parentElement.classList.toggle('active');
})
document.addEventListener('click', (e) => {
	if (!e.target.closest('.dez-shop-category')) {
		categoryBtn?.parentElement.classList.remove('active');
	}
})
const thumbs = new Swiper('.dez-product-gallery-thumb-swiper', {
	slidesPerView: 4,
	spaceBetween: 20,
	freeMode: true,
	watchSlidesProgress: true,
	direction: 'vertical',

	navigation: {
		nextEl: '.dez-product-gallery-thumb-swiper__btn-next',
		prevEl: '.dez-product-gallery-thumb-swiper__btn-prev',
	},

})
const gallery = new Swiper('.dez-product-gallery-swiper', {
	slidesPerView: 1,
	spaceBetween: 24,
	loop: true,
	pagination: {
		el: '.dez-product-gallery-swiper__pagination',
		clickable: true,
	},
	thumbs: {
		swiper: thumbs,
	}
})


new Tabs();