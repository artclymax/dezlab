<?php
$page = get_page_by_path('about');
$label = get_field('history_label', $page) ?? '';
$title = get_field('history_title', $page) ?? '';
$descr = get_field('history_descr', $page) ?? '';
$gallery = get_field('history_gallery', $page) ?? '';

$params = [
	'slidesPerView' => 'auto',
	'spaceBetween' => 20,
	'loop' => true,
];

$json = json_encode($params);
?>
<section class="section history" id="history">
	<div class="container history__container">
		<span class="history__label label">
			<?php echo esc_html($label) ?>
		</span>
		<div class="history__content">
			<h2 class="history__title title-1">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="history__descr-box descr-box">
				<?php echo wp_kses_post($descr) ?>
			</div>
		</div>
		<?php if ($gallery): ?>
			<div class="swiper history-gallery" data-swiper='<?php echo $json ?>'>
				<div class="swiper-wrapper history-gallery__wrapper">
					<?php foreach ($gallery as $item): ?>
						<div class="swiper-slide history-slide">
							<a class="history-slide__wrapper-link image-box" href="<?php echo esc_attr($item['image']) ?>" data-fancybox>
								<img src="<?php echo esc_attr($item['image']) ?>" alt="<?php echo esc_attr($title) ?>">
							</a>
						</div>
					<?php endforeach; ?>

				</div>
				<div class="history-gallery__pagination pagination" data-swiper-pagination></div>
			</div>
		<?php endif; ?>
	</div>
</section>