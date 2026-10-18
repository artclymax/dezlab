<?php
$page = get_page_by_path('about');
$list = get_field('faq_list', $page) ?? '';

$params = [
	'slidesPerView' => 1,
	'spaceBetween' => '24',
	'loop' => true,
	'effect' => 'fade',
	'autoplay' => [
		'delay' => 3000,
		'pauseOnMouseEnter' => true,
	],
];

$json = json_encode($params);
?>
<?php if ($list): ?>
	<section class="section faq" id="faq">
		<div class="container faq__container">
			<div class="swiper faq-swiper" data-swiper='<?php echo $json ?>'>
				<div class="swiper-wrapper faq-swiper__wrapper">
					<?php foreach ($list as $item): ?>
						<div class="swiper-slide faq-slide">
							<div class="faq-slide__wrapper">
								<h3 class="faq-slide__title">
									<?php echo esc_html($item['title']) ?>
								</h3>
								<p class="faq-slide__subtitle">
									<?php echo esc_html($item['subtitle']) ?>
								</p>
								<div class="faq-slide__descr descr-box">
									<?php echo wp_kses_post($item['descr']) ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="faq__decor"></div>
	</section>
<?php endif; ?>