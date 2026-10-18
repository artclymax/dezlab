<?php
$page = 'options';
$title = get_field('form_consult_title', $page) ?? '';
$descr = get_field('form_consult_descr', $page) ?? '';
$image = get_field('form_consult_image', $page) ?? '';
?>
<section class="section form-section" id="form-section">
	<div class="container form-section__container">
		<div class="form-section__form">
			<h2 class="form-section__title title-1">
				<?php echo esc_attr($title) ?>
			</h2>
			<div class="form-section__descr-box descr-box">
				<?php echo wp_kses_post($descr) ?>
			</div>
			<?php echo do_shortcode('[contact-form-7 id="e2743ea" title="Форма подбора оборудования"]') ?>
		</div>
		<div class="form-section__image image-box">
			<img src="<?php echo esc_attr($image) ?>" alt="<?php echo esc_attr($title) ?>">
		</div>
	</div>
</section>