<?php
$page = get_page_by_path('about');
$title = get_field('produce_title', $page) ?? '';
$descr = get_field('produce_descr', $page) ?? '';
$btn = get_field('produce_btn', $page) ?? '';
$image = get_field('produce_image', $page) ?? '';
?>
<section class="section produce" id="produce">
	<div class="container produce__container">
		<h2 class="produce__title title-1">
			<?php echo esc_html($title) ?>
		</h2>
		<div class="produce__content">
			<div class="produce__descr-box descr-box">
				<?php echo wp_kses_post($descr) ?>
			</div>
			<a class="produce__btn btn" href="<?php echo esc_url(home_url('/shop/')); ?>">
				<?php echo esc_html($btn) ?>
			</a>
		</div>
		<div class="produce__image-box image-box image-box--contain">
			<img src="<?php echo esc_attr($image) ?>" alt="<?php echo esc_html($title) ?>">
		</div>
	</div>
</section>