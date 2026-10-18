<?php
$class = $args['class'] ?? '';
$has_messangers = $args['has_messangers'] ?? true;
$list = get_field('opt_contacts_phones', 'options') ?? '';
?>
<?php if ($list): ?>
	<ul class="phones-list <?php echo $class ?>">
		<?php foreach ($list as $item): ?>
			<li class="phones-list__item">
				<?php if ($item['whatsup'] && $has_messangers): ?>
					<a class="phones-list__link-icon" href="<?php echo esc_attr($item['whatsup']) ?>" aria-label="Ватсапп">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/whatsapp.svg" alt="Ватсапп">
					</a>
				<?php endif; ?>
				<?php if ($item['telegram'] && $has_messangers): ?>
					<a class="phones-list__link-icon" href="<?php echo esc_attr($item['telegram']) ?>" aria-label="Телеграмм">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/telegram.svg" alt="Телеграмм">
					</a>
				<?php endif; ?>
				<a class="phones-list__link <?php echo (($item['whatsup'] || $item['telegram']) && $has_messangers) ? '' : 'icon icon--phone' ?>"
					href="tel:+<?php echo esc_attr(correct_phone($item['phone'])) ?>">
					<span class="link"><?php echo esc_html($item['phone']) ?></span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>