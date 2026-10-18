<?php
$page = get_page_by_path('home');
$title = get_field('news_title', $page) ?? '';
$btn = get_field('news_btn', $page) ?? '';

$args_post = array(
	'post_type' => 'news',
	'posts_per_page' => -1,
);

$query = new WP_Query($args_post);

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
<?php if ($query->have_posts()): ?>
	<section class="section news" id="news">
		<div class="container news__container">
			<h2 class="news__title title-1 mb-l">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="swiper news-swiper" data-swiper='<?php echo $json ?>'>
				<div class="swiper-wrapper news-swiper__wrapper">
					<?php while ($query->have_posts()):
						$query->the_post(); ?>
						<div class="swiper-slide news-slide">
							<div class="news-slide__wrapper">
								<div class="news-slide__image-box image-box">
									<?php the_post_thumbnail('large') ?>
								</div>
								<div class="news-slide__content">
									<div class="news-slide__date descr-box">
										<?php the_excerpt() ?>
									</div>
									<h3 class="news-slide__title">
										<?php the_title() ?>
									</h3>
									<button class="news-slide__link"
										data-modal-btn="<?php echo esc_attr(get_post_field('post_name', get_the_ID())) ?>">
										<span class="link">
											<?php echo esc_html($btn) ?>
										</span>
									</button>
								</div>
							</div>
						</div>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
				<div class="news-swiper__pagination pagination visible-mobile" data-swiper-pagination></div>
				<div class="news-swiper__navigation hidden-mobile">
					<button class="swiper-btn swiper-btn__prev news-swiper__btn news-swiper__btn-prev" type="button"
						data-swiper-btn-prev>
						<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M8.56055 15.1465C8.75581 15.3417 8.75581 15.6583 8.56055 15.8535C8.36528 16.0487 8.04876 16.0488 7.85351 15.8535L-3.49691e-07 8L7.85352 0.146484C8.04878 -0.048778 8.36528 -0.0487775 8.56055 0.146484C8.75581 0.341746 8.75581 0.658253 8.56055 0.853515L1.41406 8L8.56055 15.1465ZM17.5605 15.1465C17.7558 15.3417 17.7558 15.6583 17.5605 15.8535C17.3653 16.0487 17.0488 16.0488 16.8535 15.8535L9 8L16.8535 0.146484C17.0488 -0.0487778 17.3653 -0.0487778 17.5605 0.146484C17.7558 0.341747 17.7558 0.658253 17.5605 0.853516L10.4141 8L17.5605 15.1465Z"
								fill="currentColor" />
						</svg>
					</button>
					<button class="swiper-btn swiper-btn__next news-swiper__btn news-swiper__btn-next" type="button"
						data-swiper-btn-next>
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
	<?php while ($query->have_posts()):
		$query->the_post(); ?>
		<div class="modal modal-news" id="<?php echo esc_attr(get_post_field('post_name', get_the_ID())) ?>" data-modal>
			<div class="modal__box modal-news__box" data-modal-box>
				<button class="modal__close-btn modal-news__close-btn modal-close-btn" data-modal-close aria-label="Закрыть">
					<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M10.6641 0.292969C11.0546 -0.0974546 11.6876 -0.0975219 12.0781 0.292969C12.4685 0.683471 12.4685 1.31655 12.0781 1.70703L7.59961 6.18555L12.0781 10.6641C12.4684 11.0546 12.4686 11.6877 12.0781 12.0781C11.6877 12.4685 11.0546 12.4684 10.6641 12.0781L6.18555 7.59961L1.70703 12.0781C1.31654 12.4684 0.683441 12.4684 0.292969 12.0781C-0.0974914 11.6877 -0.097363 11.0546 0.292969 10.6641L4.77148 6.18555L0.292969 1.70703C-0.097525 1.31654 -0.097464 0.6835 0.292969 0.292969C0.683493 -0.0975556 1.31651 -0.0975556 1.70703 0.292969L6.18555 4.77148L10.6641 0.292969Z"
							fill="currentColor" />
					</svg>
				</button>
				<div class="modal-news__body">
					<div class="modal-news__image image-box">
						<?php the_post_thumbnail() ?>
					</div>
					<div class="modal-news__content">
						<div class="modal-news__navigation">
							<button class="swiper-btn swiper-btn__prev" type="button"
								data-modal-btn="<?php echo esc_attr(get_prev_post_slug()) ?>">
								<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M8.56055 15.1465C8.75581 15.3417 8.75581 15.6583 8.56055 15.8535C8.36528 16.0487 8.04876 16.0488 7.85351 15.8535L-3.49691e-07 8L7.85352 0.146484C8.04878 -0.048778 8.36528 -0.0487775 8.56055 0.146484C8.75581 0.341746 8.75581 0.658253 8.56055 0.853515L1.41406 8L8.56055 15.1465ZM17.5605 15.1465C17.7558 15.3417 17.7558 15.6583 17.5605 15.8535C17.3653 16.0487 17.0488 16.0488 16.8535 15.8535L9 8L16.8535 0.146484C17.0488 -0.0487778 17.3653 -0.0487778 17.5605 0.146484C17.7558 0.341747 17.7558 0.658253 17.5605 0.853516L10.4141 8L17.5605 15.1465Z"
										fill="currentColor" />
								</svg>
							</button>
							<button class="swiper-btn swiper-btn__next" type="button"
								data-modal-btn="<?php echo esc_attr(get_next_post_slug()) ?>">
								<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M9.14649 0.853516C8.95122 0.658253 8.95122 0.341748 9.14649 0.146485C9.34175 -0.04874 9.65827 -0.0487648 9.85352 0.146485L17.707 8L9.85352 15.8535C9.65825 16.0488 9.34175 16.0488 9.14648 15.8535C8.95122 15.6583 8.95122 15.3417 9.14648 15.1465L16.293 8L9.14649 0.853516ZM0.146485 0.853516C-0.0487769 0.658253 -0.0487768 0.341747 0.146485 0.146484C0.34175 -0.0487404 0.658267 -0.0487652 0.853516 0.146484L8.70703 8L0.853516 15.8535C0.658253 16.0488 0.341747 16.0488 0.146484 15.8535C-0.0487778 15.6583 -0.0487778 15.3417 0.146484 15.1465L7.29297 8L0.146485 0.853516Z"
										fill="currentColor" />
								</svg>
							</button>
						</div>
						<div class="modal-news__date descr-box icon icon--date">
							<?php the_excerpt() ?>
						</div>
						<h3 class="modal-news__title title-3">
							<?php the_title() ?>
						</h3>
						<div class="modal-news__descr-box descr-box">
							<?php the_content() ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php endwhile;
	wp_reset_postdata(); ?>
<?php endif; ?>