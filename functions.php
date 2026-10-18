<?php

// === Helpers ===
require_once get_template_directory() . '/functions/helpers/print_dump.php';
require_once get_template_directory() . '/functions/helpers/trim_text.php';
require_once get_template_directory() . '/functions/helpers/correct_phone.php';
require_once get_template_directory() . '/functions/helpers/get_prev_post_slug.php';
require_once get_template_directory() . '/functions/helpers/get_next_post_slug.php';
require_once get_template_directory() . '/functions/helpers/custom_product_category.php';
require_once get_template_directory() . '/functions/helpers/get_product_attributes_array.php';

// === BASE ====
// Общая настройка темы (лого, название и т.п.)
require_once get_template_directory() . '/functions/default_settings.php';

// Подключение стилей
require_once get_template_directory() . '/functions/connect_styles.php';

// Подключение скриптов
require_once get_template_directory() . '/functions/connect_scripts.php';

// Отключение стилей Woocommerce
add_filter('woocommerce_enqueue_styles', '__return_empty_array');
add_theme_support('woocommerce');

// Создание меню
require_once get_template_directory() . '/functions/register_nav_menus.php';

// Регистрация новых записей
require_once get_template_directory() . '/functions/register_post_type.php';

//!
add_action('wp_head', function () {
	if (defined('WP_DEBUG')) {
		$vite_server = 'http://localhost:5173';
		echo "<!-- VITE DEV INJECT: start -->\n";
		echo '<script type="module" src="' . esc_url($vite_server) . '/@vite/client"></script>';
		echo '<script type="module" src="' . esc_url($vite_server) . '/main.js"></script>';
		echo "<!-- VITE DEV INJECT: end -->\n";
	};
});
add_filter('woocommerce_get_breadcrumb', 'add_shop_to_breadcrumbs', 20, 2);

function add_shop_to_breadcrumbs($crumbs, $breadcrumb)
{
	// для страниц товара
	if (is_product()) {
		global $post;
		$terms = wp_get_post_terms($post->ID, 'product_cat');
		if ($terms && !is_wp_error($terms)) {
			$term = $terms[0]; // берем первую категорию
			$parents = get_ancestors($term->term_id, 'product_cat');
			$parents = array_reverse($parents);

			$new_crumbs = array();
			$new_crumbs[] = $crumbs[0]; // Главная

			// добавляем страницу магазина (Магазин)
			$shop_page_id = wc_get_page_id('shop');
			if ($shop_page_id > 0) {
				$new_crumbs[] = array(get_the_title($shop_page_id), get_permalink($shop_page_id));
			}

			// добавляем родительские категории
			foreach ($parents as $parent_id) {
				$parent = get_term($parent_id, 'product_cat');
				$new_crumbs[] = array($parent->name, get_term_link($parent));
			}

			// текущая категория
			$new_crumbs[] = array($term->name, get_term_link($term));

			// сам товар
			$new_crumbs[] = array(get_the_title(), '');

			return $new_crumbs;
		}
	}

	// для страниц категории
	if (is_product_category()) {
		$current_cat = get_queried_object();
		$parents = get_ancestors($current_cat->term_id, 'product_cat');
		$parents = array_reverse($parents);

		$new_crumbs = array();
		$new_crumbs[] = $crumbs[0]; // Главная

		// страница магазина
		$shop_page_id = wc_get_page_id('shop');
		if ($shop_page_id > 0) {
			$new_crumbs[] = array(get_the_title($shop_page_id), get_permalink($shop_page_id));
		}

		// родительские категории
		foreach ($parents as $parent_id) {
			$parent = get_term($parent_id, 'product_cat');
			$new_crumbs[] = array($parent->name, get_term_link($parent));
		}

		// текущая категория
		$new_crumbs[] = array($current_cat->name, get_term_link($current_cat));

		return $new_crumbs;
	}

	return $crumbs;
}