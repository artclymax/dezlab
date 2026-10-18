<?php
$page = get_page_by_path('home');
$title = get_field('featured_title', $page) ?? '';
$descr = get_field('featured_descr', $page) ?? '';
$btn = get_field('featured_btn', $page) ?? '';
$item_link = get_field('featured_item_link', $page) ?? '';
$products = get_field('featured_list', $page) ?? '';

/*
$args = array(
	'status' => 'publish',
	'limit' => 5,
	'featured' => true,
);

$products = wc_get_products($args);
*/

if ($products): ?>
	<section class="section featured-section" id="featured-section">
		<div class="container featured-section__container">
			<h2 class="featured-section__title title-1 mb-l">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="descr-box featured-section__descr-box mb-l">
				<?php echo wp_kses_post($descr) ?>
			</div>
			<ul class="featured-section__list">
				<?php foreach ($products as $product): ?>
					<li class="featured-section__item featured-card">
						<a href="<?php echo esc_url($product['link']) ?>" class="featured-card__link">
							<div class="featured-card__image">
								<img src="<?php echo esc_url($product['image']) ?>" alt="<?php echo esc_html($product['title']) ?>">
							</div>
							<div class="featured-card__content">
								<h3 class="featured-card__title">
									<span>
										<?php echo esc_html($product['title']) ?>
									</span>
								</h3>
								<span class="featured-card__link-text">
									<?php echo esc_html($item_link) ?>
								</span>
							</div>

						</a>
					</li>
				<?php endforeach; ?>
				<li class="featured-section__item featured-card featured-card--link">
					<a href="<?php echo esc_url(home_url('/shop')); ?>" class="featured-card__link">
						<span class="featured-card__text">
							<?php echo esc_html($btn) ?>
						</span>
						<span class="featured-card__icon">
							<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M10.5 0C16.299 0 21 4.70101 21 10.5C21 16.299 16.299 21 10.5 21C4.70101 21 0 16.299 0 10.5C0 4.70101 4.70101 0 10.5 0ZM10.5 1C5.25329 1 1 5.25329 1 10.5C1 15.7467 5.25329 20 10.5 20C15.7467 20 20 15.7467 20 10.5C20 5.25329 15.7467 1 10.5 1ZM11.6465 7.14648C11.8417 6.95122 12.1583 6.95122 12.3535 7.14648L15.707 10.5L12.3535 13.8535C12.1583 14.0488 11.8417 14.0488 11.6465 13.8535C11.4512 13.6583 11.4512 13.3417 11.6465 13.1465L13.793 11H6C5.72386 11 5.5 10.7761 5.5 10.5C5.5 10.2239 5.72386 10 6 10H13.793L11.6465 7.85352C11.4512 7.65825 11.4512 7.34175 11.6465 7.14648Z"
									fill="currentColor" />
							</svg>
						</span>
					</a>
				</li>
			</ul>
		</div>
	</section>
<?php endif; ?>