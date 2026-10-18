<?php
$class = $args['class'] ?? '';
$list = get_field('opt_contacts_social', 'options') ?? '';
?>
<?php if ($list): ?>
	<ul class="social-list <?php echo $class ?>">
		<?php foreach ($list as $item): ?>
			<li class="social-list__item">
				<a class="social-list__link" href="<?php echo esc_attr($item['link']) ?>">
					<img src="<?php echo esc_attr($item['icon']) ?>" alt="Соцсеть">
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>