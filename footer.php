<?php
$descr = get_field('footer_descr', 'options') ?? '';
$title_nav = get_field('footer_title_nav', 'options') ?? '';
$title_contacts = get_field('footer_title_contacts', 'options') ?? '';
$links = get_field('footer_links', 'options') ?? '';
$address = get_field('opt_contacts_address', 'options') ?? '';
$copy = get_field('footer_copy', 'options') ?? '';
?>
</main>

<footer class="footer">
	<div class="footer__top">
		<div class="footer__container-top container">
			<div class="footer__info">
				<div class="logo footer__logo">
					<?php the_custom_logo(); ?>
				</div>
				<div class="footer__descr descr-box">
					<?php echo wp_kses_post($descr) ?>
				</div>
				<?php get_template_part('partials/social-list', null, ['class' => 'footer__social-list hidden-mobile']) ?>
			</div>
			<nav class="footer__nav footer-menu hidden-mobile">
				<h3 class="footer__title">
					<?php echo esc_html($title_nav); ?>
				</h3>
				<?php
				$menu = wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'container' => false,
						'menu_class' => 'footer-menu__list',
					)
				);
				echo htmlspecialchars($menu); ?>
			</nav>
			<div class="footer__contacts">
				<h3 class="footer__title">
					<?php echo esc_html($title_contacts); ?>
				</h3>
				<?php get_template_part('partials/phones-list', null, ['class' => 'footer__phones-list']) ?>
				<?php get_template_part('partials/email-list', null, ['class' => 'footer__email-list']) ?>
				<?php get_template_part('partials/social-list', null, ['class' => 'footer__social-list visible-mobile']) ?>
			</div>
			<address class="footer__address descr-box icon icon--address">
				<?php echo wp_kses_post($address); ?>
			</address>
		</div>
	</div>
	<div class="footer__bottom">
		<div class="footer__container-bottom container">
			<?php if ($links): ?>
				<ul class="footer__links">
					<?php foreach ($links as $item): ?>
						<li class="footer__links-item">
							<a class="footer__link link" href="<?php echo esc_attr($item['link']['url']) ?>" target="_blank">
								<?php echo esc_html($item['link']['title']) ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<small class="footer__copy">&copy; <?php echo date('Y'); ?> <?php echo esc_html($copy) ?></small>
		</div>
	</div>
</footer>

<?php get_template_part('partials/modal-call') ?>
<?php get_template_part('partials/cookie-banner') ?>

<?php wp_footer(); ?>
</body>

</html>