<?php
$page = 'options';

$title = get_field('page_404_title', $page) ?: get_the_title();
$descr = get_field('page_404_descr', $page) ?? '';
$image = get_field('page_404_image', $page) ?? '';
$btn = get_field('page_404_btn', $page) ?? '';

?>
<section class="section hero-404" id="hero-404">
	<div class="container hero-404__container">
		<h1 class="hero-404__title title-1">
			<?php echo esc_html($title) ?>
		</h1>
		<div class="descr-box hero-404__descr title-3">
			<?php echo wp_kses_post($descr) ?>
		</div>
		<a class="btn hero-404__btn" href="<?php echo esc_url(home_url('/')); ?>">
			<?php echo esc_html($btn) ?>
		</a>
	</div>
	<div class="hero-404__image-box image-box">
		<img src="<?php echo esc_attr($image) ?>" alt="<?php echo esc_attr($title) ?>">
	</div>
</section>