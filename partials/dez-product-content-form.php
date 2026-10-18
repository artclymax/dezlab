<?php
$title = $args['title'] ?? '';
$text = $args['text'] ?? '';
?>
<div class="<?php echo $args['class'] ?? '' ?> dez-product-content-form hidden-mobile">
	<h2 class="dez-product-content-form__title">
		<?php echo esc_html($title) ?>
	</h2>
	<?php if ($text): ?>
		<p class="dez-product-content-form__text">
			<?php echo esc_html($text) ?>
		</p>
	<?php endif; ?>
	<?php echo do_shortcode('[contact-form-7 id="6bfcece" title="Запросить стоимость пк-версия"]') ?>
</div>