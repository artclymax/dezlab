<?php
defined('ABSPATH') || exit;

get_header('shop');
?>
<section class="dez-shop section">
	<div class="container">
		<?php
		if (woocommerce_product_loop()) {

			?>
			<aside class="dez-shop__header">
				<div class="dez-shop__category dez-shop-category">
					<button class="dez-shop__category-btn" type="button">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M11.8711 2.64795L11.8712 2.14795H11.8711V2.64795ZM12.6357 4.2915L12.2531 3.96968L12.2531 3.96971L12.6357 4.2915ZM9.33301 8.21924L8.95032 7.89745C8.87455 7.98755 8.83301 8.10151 8.83301 8.21924H9.33301ZM9.33301 11.3335L9.63298 11.7335C9.7589 11.6391 9.83301 11.4909 9.83301 11.3335H9.33301ZM6.66602 13.3335H6.16602C6.16602 13.5229 6.27301 13.696 6.4424 13.7807C6.61178 13.8654 6.81448 13.8471 6.96599 13.7335L6.66602 13.3335ZM6.66602 8.17432H7.16602C7.16602 8.05657 7.12446 7.9426 7.04867 7.85249L6.66602 8.17432ZM3.40039 4.2915L3.01763 4.61321L3.01774 4.61333L3.40039 4.2915ZM4.16602 2.64795V2.14795H4.16597L4.16602 2.64795ZM11.8711 2.64795L11.8709 3.14795C12.2955 3.14807 12.5268 3.64424 12.2531 3.96968L12.6357 4.2915L13.0184 4.61333C13.8387 3.63795 13.1462 2.14832 11.8712 2.14795L11.8711 2.64795ZM12.6357 4.2915L12.2531 3.96971L8.95032 7.89745L9.33301 8.21924L9.7157 8.54103L13.0184 4.6133L12.6357 4.2915ZM9.33301 8.21924H8.83301V11.3335H9.33301H9.83301V8.21924H9.33301ZM9.33301 11.3335L9.03303 10.9335L6.36604 12.9335L6.66602 13.3335L6.96599 13.7335L9.63298 11.7335L9.33301 11.3335ZM6.66602 13.3335H7.16602V8.17432H6.66602H6.16602V13.3335H6.66602ZM6.66602 8.17432L7.04867 7.85249L3.78305 3.96967L3.40039 4.2915L3.01774 4.61333L6.28336 8.49615L6.66602 8.17432ZM3.40039 4.2915L3.78315 3.96979C3.50986 3.64465 3.74106 3.14798 4.16606 3.14795L4.16602 2.64795L4.16597 2.14795C2.89139 2.14805 2.19747 3.63742 3.01763 4.61321L3.40039 4.2915ZM4.16602 2.64795V3.14795H11.8711V2.64795V2.14795H4.16602V2.64795Z"
								fill="currentColor" />
						</svg>
						<span>
							<?php
							$term = get_queried_object();

							if (is_product_category() && $term && isset($term->name)) {
								echo esc_html($term->name);
							} else {
								echo esc_html('Все категории');
							}
							?>
						</span>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M4 6.66675L8 10.6667L12 6.66675" stroke="currentColor" stroke-linecap="round" />
						</svg>

					</button>
					<?php custom_product_category() ?>
				</div>
				<div class="dez-shop__order">
					<?php woocommerce_catalog_ordering(); ?>
				</div>
			</aside>
			<?php
			woocommerce_product_loop_start();

			if (wc_get_loop_prop('total')) {
				while (have_posts()) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action('woocommerce_shop_loop');

					wc_get_template_part('content', 'product');
				}
			}

			woocommerce_product_loop_end();

			woocommerce_pagination();
		} else {
			?>
			<h3 class="dez-shop__not-found-title title-3 mb-l">
				Товаров, соответствующих вашему запросу, не обнаружено.
			</h3>

			<a class="btn dez-shop__not-found-btn" href="<?php echo esc_url(home_url('/shop/')); ?>">Вернуться в каталог</a>
			<?php
		}
		?>
	</div>
</section>

<?php
get_footer('shop');
