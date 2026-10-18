<?php
$page = get_page_by_path('about');
$quote = get_field('history_quote', $page) ?? '';

?>
<?php if ($quote): ?>
	<div class="section mission" id="mission">
		<blockquote class="container mission__container descr-box">
			<?php echo wp_kses_post($quote) ?>
		</blockquote>
	</div>
<?php endif; ?>