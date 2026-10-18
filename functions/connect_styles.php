<?php
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style('wp-custom-global-style', get_stylesheet_uri());
		//wp_enqueue_style('wp-custom-fonts-style', get_template_directory_uri() . '/assets/css/fonts.css');
		//wp_enqueue_style('swiper-styles', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css');
		wp_enqueue_style('wp-custom-fonts-style', get_template_directory_uri() . '/assets/fonts.css');
		wp_enqueue_style('wp-custom-main-style', get_template_directory_uri() . '/assets/main.css');
	}
);