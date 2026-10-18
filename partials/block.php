<?php
$page = $args['page'] ?? '';

$title = get_field('block_title', $page) ?? '';
$descr = get_field('block_descr', $page) ?? '';
?>
<?php if ($descr): ?>
	<div class="section block" id="block">
		<div class="block__container container">
			<h2 class="block__title title-1 mb-l">
				<?php echo esc_html($title) ?>
			</h2>
			<div class="block__descr-box descr-box">
				<?php echo wp_kses_post($descr) ?>
			</div>
		</div>
	</div>
<?php endif; ?>