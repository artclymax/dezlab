<?php
$page = get_page_by_path('contacts');
$title = get_field('contacts_page_title', $page) ?? '';

$phones_title = get_field('opt_contacts_phone_title', 'options') ?? '';
$phones_text = get_field('opt_contacts_phone_text', 'options') ?? '';

$email_title = get_field('opt_contacts_email_title', 'options') ?? '';
$email_text = get_field('opt_contacts_email_text', 'options') ?? '';

$address_title = get_field('opt_contacts_address_title', 'options') ?? '';
$address = get_field('opt_contacts_address', 'options') ?? '';
$address_text = get_field('opt_contacts_address_text', 'options') ?? '';

$time_title = get_field('opt_contacts_time_title', 'options') ?? '';
$time = get_field('opt_contacts_time_descr', 'options') ?? '';

$messangers_title = get_field('opt_contacts_messangers_title', 'options') ?? '';
$messangers = get_field('opt_contacts_messangers', 'options') ?? '';
?>
<section class="section contacts-section" id="contacts-section">
	<div class="container contacts-section__container">
		<h2 class="contacts-section__title title-1 mb-l">
			<?php echo esc_html($title) ?>
		</h2>
		<div class="contacts-section__content">
			<div class="contacts-section__box contact-box">
				<h3 class="contact-box__title title-3">
					<?php echo esc_html($phones_title) ?>
				</h3>
				<div class="contact-box__content">
					<?php get_template_part('partials/phones-list', null, ['has_messangers' => false]) ?>
				</div>
				<small class="contact-box__text">
					<?php echo esc_html($phones_text) ?>
				</small>
			</div>
			<div class="contacts-section__box contact-box">
				<h3 class="contact-box__title title-3">
					<?php echo esc_html($email_title) ?>
				</h3>
				<div class="contact-box__content">
					<?php get_template_part('partials/email-list') ?>
				</div>
				<small class="contact-box__text">
					<?php echo esc_html($email_text) ?>
				</small>
			</div>
			<div class="contacts-section__box contact-box">
				<h3 class="contact-box__title title-3">
					<?php echo esc_html($address_title) ?>
				</h3>
				<div class="contact-box__content">
					<address class="descr-box icon icon--address">
						<div class="contact-box__descr">
							<?php echo wp_kses_post($address) ?>
						</div>
					</address>
				</div>
				<small class="contact-box__text">
					<?php echo esc_html($address_text) ?>
				</small>
			</div>
			<div class="contacts-section__box contact-box">
				<h3 class="contact-box__title title-3">
					<?php echo esc_html($time_title) ?>
				</h3>
				<div class="contact-box__content icon icon--time">
					<div class="contact-box__descr descr-box ">
						<?php echo wp_kses_post($time) ?>
					</div>
				</div>
			</div>
			<?php if ($messangers): ?>
				<h2 class="contacts-section__title title-1 mb-l">
					<?php echo esc_html($messangers_title) ?>
				</h2>
				<ul class="contacts-section__messangers messangers">
					<?php foreach ($messangers as $item): ?>
						<li class="messangers__item">
							<a class="messangers__link" href="<?php echo esc_attr($item['link']); ?>" target="_blank"
								aria-label="Мессенджер">
								<img src="<?php echo esc_attr($item['icon']); ?>" alt="Мессенджер">
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="contacts-section__form-wrapper">
			<?php get_template_part('partials/dez-product-content-form', null, ['title' => get_field('contacts_page_form_title', get_page_by_path('contacts')), 'text' => get_field('contacts_page_form_text', get_page_by_path('contacts'))]) ?>
		</div>
	</div>
</section>