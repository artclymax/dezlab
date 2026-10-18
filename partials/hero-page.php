<?php
$page = get_page_by_path('home');
$list = get_field('hero_slides', $page) ?? '';
$catalog_btn = get_field('hero_catalog_btn', $page) ?? '';
$product_btn = get_field('hero_product_btn', $page) ?? '';

$params = [
	'slidesPerView' => '1',
	'spaceBetween' => '24',
	'loop' => true,
	'effect' => 'fade',
	'autoplay' => [
		'delay' => 3000,
		'pauseOnMouseEnter' => true,
	],
	//'autoHeight' => true,
];
$json = json_encode($params);
?>
<section class="section hero" id="hero">
	<div class="container hero__container">
		<?php if ($list): ?>
			<div class="swiper hero-swiper" data-swiper='<?php echo $json ?>'>
				<div class="swiper-wrapper hero-swiper__wrapper">
					<?php foreach ($list as $item): ?>
						<div class="swiper-slide hero-slide">
							<div class="hero-slide__wrapper">
								<div class="hero-slide__content">
									<h3 class="hero-slide__title title-1">
										<?php echo esc_html($item['title']) ?>
									</h3>
									<div class="hero-slide__descr-box descr-box">
										<?php echo wp_kses_post($item['descr']) ?>
									</div>
									<div class="hero-slide__btn-box hidden-mobile">
										<a class="hero-slide__btn btn" href="<?php echo esc_url(home_url('/shop')); ?>">
											<?php echo esc_html($catalog_btn) ?>
										</a>
										<a class="hero-slide__link link" href="<?php echo esc_url($item['link']); ?>">
											<?php echo esc_html($product_btn) ?>
										</a>
									</div>
								</div>
								<a class="hero-slide__image" href="<?php echo esc_url($item['link']); ?>">
									<img src="<?php echo esc_attr($item['kartinka']) ?>" alt="<?php echo esc_attr($item['title']) ?>">
								</a>
								<div class="hero-slide__btn-box visible-mobile">
									<a class="hero-slide__btn btn" href="<?php echo esc_url(home_url('/shop')); ?>">
										<?php echo esc_html($catalog_btn) ?>
									</a>
									<a class="hero-slide__link btn btn--stroke" href="<?php echo esc_url($item['link']); ?>">
										<?php echo esc_html($product_btn) ?>
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="hero-swiper__pagination pagination" data-swiper-pagination></div>
			</div>
		<?php endif; ?>
	</div>
</section>