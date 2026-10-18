<?php
$title = $args['title'] ?? '';
$text = $args['text'] ?? '';
?>
<div class="section dez-product-details dez-product-form visible-mobile <?php echo esc_attr($args['class'] ?? '') ?>"
	id="form">
	<div class="dez-product-form__container container">
		<div class="dez-product-form__body">
			<h2 class="dez-product-form__title title-3 mb-l">
				<?php echo esc_html($title) ?>
			</h2>
			<?php if ($text): ?>
				<p class="dez-product-content-form__text">
					<?php echo esc_html($text) ?>
				</p>
			<?php endif; ?>
			<?php echo do_shortcode('[contact-form-7 id="6bfcece" title="Запросить стоимость пк-версия"]') ?>
		</div>
	</div>
</div>