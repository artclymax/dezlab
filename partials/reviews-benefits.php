<?php
$page = get_page_by_path('reviews');
$list = get_field('reviews_benefits_list', $page) ?? '';

?>
<?php if ($list): ?>
	<div class="section reviews-benefits" id="reviews-benefits">
		<div class="container reviews-benefits__container">
			<ul class="reviews-benefits__list">
				<?php foreach ($list as $item): ?>
					<li class="reviews-benefits__item reviews-benefit-card">
						<span class="reviews-benefit-card__number">
							<?php echo esc_html($item['number']) ?>
						</span>
						<p class="reviews-benefit-card__text">
							<?php echo esc_html($item['text']) ?>
						</p>
					</li>
				<?php endforeach; ?>
			</ul>

		</div>
	</div>
<?php endif; ?>