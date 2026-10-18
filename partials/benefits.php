<?php
$page = get_page_by_path('about');
$title = get_field('benefits_title', $page) ?? '';
$descr = get_field('benefits_descr', $page) ?? '';
$list = get_field('benefits_list', $page) ?? '';
$image = get_field('benefits_item_bg', $page) ?? '';

$params = [
	'slidesPerView' => '1',
	'spaceBetween' => '24',
	'loop' => true,
	'effect' => 'fade',
];

$json = json_encode($params);
?>
<?php if ($list): ?>
	<section class="section benefits" id="benefits">
		<div class="container benefits__container">
			<h2 class="benefits__title title-1 mb-l">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="benefits__descr-box descr-box">
				<?php echo wp_kses_post($descr) ?>
			</div>
			<ul class="benefits__list hidden-mobile">
				<?php foreach ($list as $item): ?>
					<li class="benefits__item benefit-card" style="--bg: url('<?php echo esc_attr($image) ?>')">
						<div class="benefit-card__icon">
							<img src="<?php echo esc_attr($item['icon']) ?>" alt="<?php echo esc_attr($item['title']) ?>">
						</div>
						<h3 class="benefit-card__title title-3">
							<span>
								<?php echo esc_html($item['title']) ?>
							</span>
						</h3>
						<div class="benefit-card__descr-box descr-box">
							<?php echo wp_kses_post($item['descr']) ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="benefits__mobile visible-mobile">
				<div class="benefits__first-item benefit-card" style="--bg: url('<?php echo esc_attr($image) ?>')">
					<div class="benefit-card__icon">
						<img src="<?php echo esc_attr($list[0]['icon']) ?>" alt="<?php echo esc_attr($list[0]['title']) ?>">
					</div>
					<h3 class="benefit-card__title title-3">
						<?php echo esc_html($list[0]['title']) ?>
					</h3>
					<div class="benefit-card__descr-box descr-box">
						<?php echo wp_kses_post($list[0]['descr']) ?>
					</div>
				</div>
				<div class="swiper benefits-swiper" data-swiper='<?php echo $json ?>'>
					<div class="swiper-wrapper benefits-swiper__wrapper">
						<?php
						$index = 0;
						foreach ($list as $item): ?>
							<?php if ($index != 0): ?>
								<div class="swiper-slide benefits-slide">
									<div class="benefits__item benefit-card" style="--bg: url('<?php echo esc_attr($image) ?>')">
										<div class="benefit-card__icon">
											<img src="<?php echo esc_attr($item['icon']) ?>" alt="<?php echo esc_attr($item['title']) ?>">
										</div>
										<h3 class="benefit-card__title title-3">
											<?php echo esc_html($item['title']) ?>
										</h3>
										<div class="benefit-card__descr-box descr-box">
											<?php echo wp_kses_post($item['descr']) ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<?php
							$index++;
						endforeach;
						?>
					</div>
					<div class="benefits-swiper__pagination pagination" data-swiper-pagination></div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>