<?php
$class = $args['class'] ?? '';
$list = get_field('opt_contacts_email', 'options') ?? '';
?>
<?php if ($list): ?>
	<ul class="phones-list email-list <?php echo $class ?>">
		<?php foreach ($list as $item): ?>
			<li class="phones-list__item icon" style="--icon-src: url('<?php echo esc_attr($item['icon']) ?>')">
				<a class="phones-list__link link" href="mailto:<?php echo esc_attr($item['email']) ?>">
					<?php echo esc_html($item['email']) ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>