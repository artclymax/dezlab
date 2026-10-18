<?php

defined('ABSPATH') || exit;

global $product;
$gallery_ids = $product->get_gallery_image_ids();
$main_image_id = $product->get_image_id();

$attributes = get_product_attributes_array($product);

$hint = get_field('product_page_hint', get_page_by_path('shop')) ?? '';
$btn = get_field('product_btn', get_page_by_path('shop')) ?? '';
$benefits = get_field('product_benefits', get_page_by_path('shop')) ?? '';
$features_title = get_field('product_features_title') ?? '';
$features = get_field('product_features') ?? '';
$certificates_title = get_field('product_certificates_title') ?? '';
$certificates = get_field('product_certificates') ?? '';
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('dez-product-page', $product); ?>>
	<!-- dez-product-summary -->
	<section class="dez-product-page__summary section dez-product-summary container">
		<a class="dez-product-summary__link-back" href="<?php echo esc_url(home_url('/shop/')); ?>">
			<svg width="20" height="13" viewBox="0 0 20 13" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M19.207 6.5C19.207 6.77613 18.9832 7 18.707 7L1.91406 7L7.06055 12.1465C7.25579 12.3417 7.2558 12.6583 7.06055 12.8535C6.86529 13.0488 6.54877 13.0488 6.35352 12.8535L0 6.5L6.35352 0.146484C6.54878 -0.0487778 6.86528 -0.0487778 7.06055 0.146484C7.25579 0.341748 7.2558 0.65826 7.06055 0.853516L1.91406 6L18.707 6C18.9832 6 19.207 6.22386 19.207 6.5Z"
					fill="currentColor" />
			</svg>
			<span>Вернуться в каталог</span>
		</a>
		<div class="dez-product-summary__header">
			<span class="dez-product-summary__label">
				<?php echo esc_html(get_the_terms(get_the_ID(), 'product_cat')[0]->name); ?>
			</span>
			<h1 class="dez-product-summary__title title-3">
				<?php the_title(); ?>
			</h1>
		</div>
		<div class="dez-product-summary__gallery dez-product-gallery ">
			<?php if (!empty($gallery_ids)): ?>
				<div class="dez-product-gallery__thumb-swiper hidden-mobile">
					<button
						class="dez-product-gallery-thumb-swiper__btn dez-product-gallery-thumb-swiper__btn-prev swiper-btn swiper-btn__prev"
						type="button">
						<svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M0.853516 8.56055C0.658253 8.75581 0.341747 8.75581 0.146484 8.56055C-0.0487396 8.36528 -0.0487649 8.04877 0.146484 7.85352L8 0L15.8535 7.85352C16.0488 8.04878 16.0488 8.36528 15.8535 8.56055C15.6583 8.75581 15.3417 8.75581 15.1465 8.56055L8 1.41406L0.853516 8.56055ZM0.853516 17.5605C0.658253 17.7558 0.341747 17.7558 0.146484 17.5605C-0.0487398 17.3653 -0.048765 17.0488 0.146484 16.8535L8 9L15.8535 16.8535C16.0488 17.0488 16.0488 17.3653 15.8535 17.5605C15.6583 17.7558 15.3417 17.7558 15.1465 17.5605L8 10.4141L0.853516 17.5605Z"
								fill="currentColor" />
						</svg>
					</button>
					<div class="swiper dez-product-gallery-thumb-swiper">
						<div class="swiper-wrapper dez-product-gallery-thumb-swiper__wrapper hidden-mobile">
							<?php foreach ($gallery_ids as $image_id): ?>
								<div class="swiper-slide dez-product-gallery-thumb-slide">
									<div class="dez-product-gallery-thumb-slide__image image-box">
										<?php echo wp_get_attachment_image($image_id, 'media'); ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<button
						class="dez-product-gallery-thumb-swiper__btn dez-product-gallery-thumb-swiper__btn-next swiper-btn swiper-btn__next"
						type="button">
						<svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M13.7002 8.27832C13.8954 8.08316 14.2119 8.08334 14.4072 8.27832C14.6025 8.47358 14.6025 8.79009 14.4072 8.98535L7.63086 15.7627L7.27734 16.1162L0.146484 8.98535C-0.0486297 8.79008 -0.0487284 8.47353 0.146484 8.27832C0.341698 8.08311 0.658244 8.08321 0.853516 8.27832L7.27637 14.7012L13.7002 8.27832ZM13.7002 0.146484C13.8954 -0.0487352 14.212 -0.0486501 14.4072 0.146484C14.6024 0.341757 14.6024 0.658295 14.4072 0.853516L7.63086 7.63086L7.27734 7.98438L0.146484 0.853516C-0.0486894 0.658342 -0.0485129 0.341768 0.146484 0.146484C0.341747 -0.0487778 0.658253 -0.0487778 0.853516 0.146484L7.27637 6.56934L13.7002 0.146484Z"
								fill="currentColor" />
						</svg>
					</button>
				</div>
				<div class="swiper dez-product-gallery-swiper">
					<div class="swiper-wrapper dez-product-gallery-swiper__wrapper">
						<?php foreach ($gallery_ids as $image_id): ?>
							<div class="swiper-slide dez-product-gallery-slide">
								<a class="dez-product-gallery-slide__wrapper-link image-box"
									href="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'full')); ?>"
									data-fancybox="gallery">
									<?php echo wp_get_attachment_image($image_id, 'large'); ?>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="dez-product-gallery-swiper__pagination pagination" data-swiper-pagination></div>
				</div>
			<?php else: ?>
				<a class="dez-product-gallery__image image-box"
					href="<?php echo esc_url(wp_get_attachment_image_url($main_image_id, 'full')); ?>" data-fancybox>
					<?php echo wp_get_attachment_image($main_image_id, 'large'); ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="dez-product-summary__content dez-product-content">
			<div class="dez-product-content__descr descr-box hidden-mobile">
				<?php the_content(); ?>
			</div>
			<div class="dez-product-content__mobile-content visible-mobile">
				<a class="dez-product-content__btn btn" href="#form">
					<?php echo esc_html($btn) ?>
				</a>
				<small class="dez-product-content__hint">
					<?php echo esc_html($hint) ?>
				</small>
				<div class="dez-product-content__spoiler-wrapper">
					<div class="dez-product-spoiler spoiler-active" data-spoiler>
						<button class="dez-product-spoiler__btn" data-spoiler-btn>
							<h3 class="dez-product-spoiler__title title-3">
								Описание
							</h3>
							<span class="dez-product-spoiler__icon">
								<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M8.5 0C8.77614 0 9 0.223858 9 0.5V8H16.5C16.7761 8 17 8.22386 17 8.5C17 8.77614 16.7761 9 16.5 9H9V16.5C9 16.7761 8.77614 17 8.5 17C8.22386 17 8 16.7761 8 16.5V9H0.5C0.223858 9 0 8.77614 0 8.5C0 8.22386 0.223858 8 0.5 8H8V0.5C8 0.223858 8.22386 0 8.5 0Z"
										fill="currentColor" />
								</svg>
							</span>
						</button>
						<div class="dez-product-spoiler__content">
							<div class="dez-product-spoiler__descr descr-box">
								<?php the_content() ?>
							</div>
						</div>
					</div>
					<?php if ($attributes): ?>
						<div class="dez-product-spoiler" data-spoiler>
							<button class="dez-product-spoiler__btn" data-spoiler-btn>
								<h3 class="dez-product-spoiler__title title-3">
									Характеристики
								</h3>
								<span class="dez-product-spoiler__icon">
									<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M8.5 0C8.77614 0 9 0.223858 9 0.5V8H16.5C16.7761 8 17 8.22386 17 8.5C17 8.77614 16.7761 9 16.5 9H9V16.5C9 16.7761 8.77614 17 8.5 17C8.22386 17 8 16.7761 8 16.5V9H0.5C0.223858 9 0 8.77614 0 8.5C0 8.22386 0.223858 8 0.5 8H8V0.5C8 0.223858 8.22386 0 8.5 0Z"
											fill="currentColor" />
									</svg>
								</span>
							</button>
							<div class="dez-product-spoiler__content">
								<ul class="dez-product-spoiler__list">
									<?php foreach ($attributes as $attribute): ?>
										<li class="dez-product-spoiler__item attr-item">
											<h4 class="attr-item__name">
												<?php echo esc_html($attribute['name']) ?>
											</h4>
											<p class="attr-item__value"><?php echo esc_html(implode('; ', $attribute['values'])) ?></p>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($features): ?>
						<div class="dez-product-spoiler" data-spoiler>
							<button class="dez-product-spoiler__btn" data-spoiler-btn>
								<h3 class="dez-product-spoiler__title title-3">
									<?php echo esc_html($features_title) ?>
								</h3>
								<span class="dez-product-spoiler__icon">
									<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M8.5 0C8.77614 0 9 0.223858 9 0.5V8H16.5C16.7761 8 17 8.22386 17 8.5C17 8.77614 16.7761 9 16.5 9H9V16.5C9 16.7761 8.77614 17 8.5 17C8.22386 17 8 16.7761 8 16.5V9H0.5C0.223858 9 0 8.77614 0 8.5C0 8.22386 0.223858 8 0.5 8H8V0.5C8 0.223858 8.22386 0 8.5 0Z"
											fill="currentColor" />
									</svg>
								</span>
							</button>
							<div class="dez-product-spoiler__content">
								<ul class="dez-product-spoiler__list">
									<?php foreach ($features as $item): ?>
										<li class="dez-product-spoiler__item product-features-item">
											<p class="product-features-item__text icon icon--features">
												<?php echo esc_html($item['text']) ?>
											</p>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</div>
			<?php if ($benefits): ?>
				<ul class="dez-product-content__benefits dez-product-benefits">
					<?php foreach ($benefits as $item): ?>
						<li class="dez-product-benefits__item">
							<div class="dez-product-benefits__icon">
								<img src="<?php echo esc_attr($item['icon']) ?>" alt="<?php echo esc_attr($item['text']) ?>">
							</div>
							<h3 class="dez-product-benefits__title">
								<?php echo esc_html($item['text']) ?>
							</h3>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<?php get_template_part('partials/dez-product-content-form', null, ['class' => 'dez-product-content__form', 'title' => $btn]) ?>
		</div>
	</section>
	<!-- dez-product-details -->
	<?php if ($attributes || $features || $certificates): ?>
		<div class="dez-product-page__details section dez-product-details hidden-mobile">
			<div class="dez-product-details__container container">
				<ul class="dez-product-details__links">
					<?php if ($attributes): ?>
						<li class="dez-product-details__links-item">
							<a class="dez-product-details__links-link" href="#attrs" data-tab-link>
								<span>Характеристики</span>
							</a>
						</li>
					<?php endif; ?>
					<?php if ($features): ?>
						<li class="dez-product-details__links-item">
							<a class="dez-product-details__links-link" href="#features" data-tab-link>
								<span><?php echo esc_html($features_title) ?></span>
							</a>
						</li>
					<?php endif; ?>
					<?php if ($certificates): ?>
						<li class="dez-product-details__links-item">
							<a class="dez-product-details__links-link" href="#certificates" data-tab-link>
								<span><?php echo esc_html($certificates_title) ?></span>
							</a>
						</li>
					<?php endif; ?>
				</ul>
				<?php if ($attributes): ?>
					<article class="dez-product-details__tab" id="attrs" data-tab>
						<ul class="dez-product-details__list attr-details-list">
							<?php foreach ($attributes as $attribute): ?>
								<li class="dez-product-details__item attr-item">
									<h4 class="attr-item__name">
										<?php echo esc_html($attribute['name']) ?>
									</h4>
									<p class="attr-item__value"><?php echo esc_html(implode('; ', $attribute['values'])) ?></p>
								</li>
							<?php endforeach ?>
						</ul>
					</article>
				<?php endif; ?>
				<?php if ($features): ?>
					<article class="dez-product-details__tab" id="features" data-tab>
						<ul class="dez-product-details__list">
							<?php foreach ($features as $item): ?>
								<li class="dez-product-details__item product-features-item">
									<p class="product-features-item__text icon icon--features">
										<?php echo esc_html($item['text']) ?>
									</p>
								</li>
							<?php endforeach ?>
						</ul>
					</article>
				<?php endif; ?>
				<?php if ($certificates): ?>
					<article class="dez-product-details__tab" id="certificates" data-tab>
						<ul class="dez-product-details__list">
							<?php foreach ($certificates as $item): ?>
								<li class="dez-product-details__item">
									<a class="dez-product-details__link icon icon--file" href="<?php echo esc_html($item['file']) ?>"
										target="_blank">
										<span class="link">
											<?php echo esc_html($item['title']) ?>
										</span>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
					</article>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	<!-- dez-product-page__form -->
	<?php get_template_part('partials/dez-product-page-form', null, ['class' => 'dez-product-page__form', 'title' => $btn]) ?>
	<!-- dez-product-page__related-->
	<div class="dez-product-page__related section related-section">
		<div class="container related-section__container">
			<h2 class="related-section__title title-1 mb-l">
				Рекомендуемые товары
			</h2>
			<?php
			$params = [
				'slidesPerView' => 1,
				'spaceBetween' => 20,
				'loop' => true,
				'breakpoints' => [
					'1024' => [
						'slidesPerView' => 3,
					],
					'576' => [
						'slidesPerView' => 2,
					],
				]
			];

			$json = json_encode($params);
			?>
			<div class="swiper related-swiper" data-swiper='<?php echo $json ?>'>
				<div class="swiper-wrapper related-swiper__wrapper">
					<?php
					global $product;

					if (!$product) {
						return;
					}

					$limit = 3;
					$related_ids = wc_get_related_products($product->get_id(), $limit);


					if (!empty($related_ids)) {
						foreach ($related_ids as $related_id) {
							echo '<div class="swiper-slide related-slide"> <div class="related-slide__wrapper">';
							$post_object = get_post($related_id);
							setup_postdata($GLOBALS['post'] =& $post_object);
							wc_get_template_part('content', 'product');
							echo '</div></div>';
						}
					} else {
						$upsell_ids = $product->get_upsell_ids();
						if (!empty($upsell_ids)) {
							$upsell_ids = array_slice($upsell_ids, 0, $limit);
							foreach ($upsell_ids as $upsell_id) {
								echo '<div class="swiper-slide related-slide"> <div class="related-slide__wrapper">';
								$post_object = get_post($upsell_id);
								setup_postdata($GLOBALS['post'] =& $post_object);
								wc_get_template_part('content', 'product');
								echo '</div></div>';
							}
						} else {
							$args = [
								'post_type' => 'product',
								'posts_per_page' => $limit,
								'orderby' => 'rand',
								'post__not_in' => [$product->get_id()],
								'post_status' => 'publish',
							];

							$loop = new WP_Query($args);
							if ($loop->have_posts()) {
								while ($loop->have_posts()) {
									$loop->the_post();
									echo '<div class="swiper-slide related-slide"> <div class="related-slide__wrapper">';
									wc_get_template_part('content', 'product');
									echo '</div></div>';
								}
							}
						}
					}
					wp_reset_postdata();

					?>
				</div>
				<div class="related-swiper__pagination pagination" data-swiper-pagination></div>
			</div>
		</div>
	</div>
</div>