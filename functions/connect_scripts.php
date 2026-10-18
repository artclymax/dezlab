<?php
add_action(
	'wp_enqueue_scripts',
	function () {
		//wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), false, true);
		//wp_enqueue_script('imask', 'https://unpkg.com/imask', array(), false, true);
		//wp_enqueue_script('rangeSlider', 'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js', array('jquery'), false, true);
		//wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), false, true);
		//wp_enqueue_script('wp-custom-main-script', get_template_directory_uri() . '/assets/main.js', array(), false, true);
		//wp_enqueue_script('wp-custom-range-slider', get_template_directory_uri() . '/assets/range-slider.js', array('jquery', 'rangeSlider'), false, true);
		wp_enqueue_script('wp-custom-wp-script', get_template_directory_uri() . '/assets/main.js', array(), false, true);
	}
);