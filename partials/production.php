<?php
$page = get_page_by_path('about');
$title = get_field('production_title', $page) ?? '';
$descr = get_field('production_descr', $page) ?? '';
$list = get_field('production_gallery', $page) ?? '';

$params = [
	'slidesPerView' => 1,
	'spaceBetween' => 20,
	'loop' => true,
	'navigation' => [
		'nextEl' => '.production-swiper-btn__next',
		'prevEl' => '.production-swiper-btn__prev',
	],
	'breakpoints' => [
		'576' => [
			'slidesPerView' => 2,
		],
		'1024' => [
			'slidesPerView' => 3,
		],
	]
];

$json = json_encode($params);
?>
<?php if ($list): ?>
	<section class="section production" id="production">
		<div class="container production__container">
			<h2 class="production__title title-1 mb-l">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="production__descr-box descr-box">
				<?php echo wp_kses_post($descr) ?>
			</div>
			<div class="production-swiper-wrapper">
				<div class="swiper production-swiper" data-swiper='<?php echo $json ?>'>
					<div class="swiper-wrapper production-swiper__wrapper">
						<?php foreach ($list as $item): ?>
							<div class="swiper-slide production-slide">
								<a class="production-slide__wrapper-link image-box" href="<?php echo esc_attr($item['image']) ?>"
									data-fancybox>
									<img src="<?php echo esc_attr($item['image']) ?>" alt="<?php echo esc_attr($title) ?>">
								</a>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="production-swiper__pagination pagination" data-swiper-pagination></div>
				</div>
				<div class="production-swiper__navigation hidden-mobile">
					<button class="swiper-btn production-swiper-btn__prev" type="button">
						<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M8.56055 15.1465C8.75581 15.3417 8.75581 15.6583 8.56055 15.8535C8.36528 16.0487 8.04876 16.0488 7.85351 15.8535L-3.49691e-07 8L7.85352 0.146484C8.04878 -0.048778 8.36528 -0.0487775 8.56055 0.146484C8.75581 0.341746 8.75581 0.658253 8.56055 0.853515L1.41406 8L8.56055 15.1465ZM17.5605 15.1465C17.7558 15.3417 17.7558 15.6583 17.5605 15.8535C17.3653 16.0487 17.0488 16.0488 16.8535 15.8535L9 8L16.8535 0.146484C17.0488 -0.0487778 17.3653 -0.0487778 17.5605 0.146484C17.7558 0.341747 17.7558 0.658253 17.5605 0.853516L10.4141 8L17.5605 15.1465Z"
								fill="currentColor" />
						</svg>
					</button>
					<button class="swiper-btn production-swiper-btn__next" type="button">
						<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.14649 0.853516C8.95122 0.658253 8.95122 0.341748 9.14649 0.146485C9.34175 -0.04874 9.65827 -0.0487648 9.85352 0.146485L17.707 8L9.85352 15.8535C9.65825 16.0488 9.34175 16.0488 9.14648 15.8535C8.95122 15.6583 8.95122 15.3417 9.14648 15.1465L16.293 8L9.14649 0.853516ZM0.146485 0.853516C-0.0487769 0.658253 -0.0487768 0.341747 0.146485 0.146484C0.34175 -0.0487404 0.658267 -0.0487652 0.853516 0.146484L8.70703 8L0.853516 15.8535C0.658253 16.0488 0.341747 16.0488 0.146484 15.8535C-0.0487778 15.6583 -0.0487778 15.3417 0.146484 15.1465L7.29297 8L0.146485 0.853516Z"
								fill="currentColor" />
						</svg>
					</button>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>