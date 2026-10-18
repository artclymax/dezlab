<?php
defined('ABSPATH') || exit;

global $product;
if (!is_a($product, WC_Product::class) || !$product->is_visible()) {
	return;
} ?>
<li <?php wc_product_class('dez-product-card', $product); ?>>
	<a class="dez-product-card__link-wrapper" href="<?php the_permalink() ?>">
		<div class="dez-product-card__label">
			<?php echo esc_html(get_the_terms(get_the_ID(), 'product_cat')['0']->name) ?>
		</div>
		<div class="dez-product-card__image image-box">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="dez-product-card__content">
			<h3 class="dez-product-card__title">
				<?php the_title(); ?>
			</h3>
			<div class="dez-product-card__decr descr-box">
				<?php the_excerpt(); ?>
			</div>
			<small class="dez-product-card__hint">
				<?php the_field('product_hint', get_page_by_path('shop')); ?>
			</small>
			<button class="dez-product-card__btn btn" type="button">
				<?php the_field('product_btn', get_page_by_path('shop')); ?>
			</button>
		</div>
	</a>
</li>