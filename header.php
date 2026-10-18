<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="wrapper">

		<?php
		$contacts_title = get_field('header_contacts_title', 'options') ?? '';
		$btn = get_field('header_modal_btn', 'options') ?? '';
		$news = get_field('header_news', 'options') ?? '';
		$phone = get_field('header_phone', 'options') ?? '';
		?>

		<header class="header">
			<div class="header__top">
				<div class="container header__top-container">
					<?php get_template_part('partials/phones-list', null, ['class' => 'header__phones-list']) ?>
					<button class="header__btn btn hidden-tablet" type="button" data-modal-btn="modal-call">
						<?php echo esc_html($btn); ?>
					</button>
				</div>
			</div>
			<div class="header__middle" data-auto-calc="header, height">
				<div class="container header__middle-container">
					<div class="logo header__logo">
						<?php the_custom_logo(); ?>
					</div>
					<nav class="header-menu header__menu">
						<?php
						$menu = wp_nav_menu(
							array(
								'theme_location' => 'header-menu',
								'container' => false,
								'menu_class' => 'header-menu__list',
							)
						);
						echo htmlspecialchars($menu); ?>
						<div class="header-menu__contacts-box visible-tablet">
							<button class="header-menu__btn btn" type="button" data-modal-btn="modal-call">
								<?php echo esc_html($btn); ?>
							</button>
							<h3 class="header-menu__title">
								<?php echo esc_html($contacts_title) ?>
							</h3>
							<?php get_template_part('partials/phones-list', null, ['class' => 'header-menu__phones-list']) ?>
							<?php get_template_part('partials/email-list', null, ['class' => 'header-menu__email-list']) ?>
						</div>
					</nav>
					<a class="header__phone-btn phone-btn visible-tablet"
						href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>" aria-label="Позвонить"
						style="display: none;">
						<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M11.1606 4.25C13.7626 4.25007 15.7495 6.55319 15.7495 9.23535V15.7646C15.7495 18.4468 13.7626 20.7499 11.1606 20.75C10.6036 20.75 10.0494 20.6649 9.51514 20.498L9.06982 20.3594C8.47482 20.1735 7.91907 19.9001 7.4126 19.5557C9.87513 25.4347 14.564 30.123 20.4429 32.5859C20.0987 32.0797 19.8258 31.5243 19.6401 30.9297L19.5015 30.4844C19.3346 29.95 19.2495 29.396 19.2495 28.8389C19.2496 26.237 21.5529 24.2502 24.2349 24.25H30.7642C33.4463 24.25 35.7494 26.2369 35.7495 28.8389C35.7495 29.3961 35.6644 29.95 35.4976 30.4844L35.3589 30.9297C34.611 33.3245 32.4605 35.0856 29.854 35.5449C28.2989 35.8189 26.7001 35.8189 25.145 35.5449C25.0518 35.5285 24.9587 35.51 24.8667 35.4902C14.5764 33.4699 6.52911 25.4223 4.50928 15.1318C4.48961 15.0401 4.47097 14.9475 4.45459 14.8545C4.18059 13.2993 4.18059 11.7007 4.45459 10.1455C4.91386 7.53914 6.67519 5.38857 9.06982 4.64062L9.51514 4.50195C10.0494 4.33514 10.6036 4.25004 11.1606 4.25ZM24.2349 25.75C22.2394 25.7502 20.7496 27.2006 20.7495 28.8389C20.7495 29.2431 20.8111 29.6464 20.9331 30.0371L21.0718 30.4824C21.6323 32.2774 23.2771 33.6833 25.3823 34.0625C25.392 34.0643 25.4029 34.0666 25.4126 34.0684C26.7933 34.3108 28.2137 34.3106 29.5942 34.0674C31.7105 33.6943 33.3647 32.2839 33.9272 30.4824L34.0659 30.0371C34.1879 29.6463 34.2495 29.2432 34.2495 28.8389C34.2494 27.2005 32.7599 25.75 30.7642 25.75H24.2349ZM11.1606 5.75C10.7565 5.75004 10.353 5.81165 9.9624 5.93359L9.51709 6.07227C7.71572 6.63492 6.30515 8.28915 5.93213 10.4053C5.6888 11.7862 5.68858 13.2068 5.93115 14.5879L5.93213 14.5947L6.01416 14.9854C6.48289 16.913 7.82815 18.4002 9.51709 18.9277L9.9624 19.0664C10.353 19.1884 10.7565 19.25 11.1606 19.25C12.799 19.2499 14.2495 17.7604 14.2495 15.7646V9.23535C14.2495 7.23964 12.799 5.75007 11.1606 5.75ZM21.4614 4.69922C25.3068 3.60374 29.561 4.50689 32.5269 7.47266C35.4929 10.4387 36.396 14.6935 35.3003 18.5391C35.1867 18.9373 34.7718 19.1681 34.3735 19.0547C33.9753 18.9412 33.7445 18.5262 33.8579 18.1279C34.8162 14.7645 34.0179 11.0848 31.4663 8.5332C28.9147 5.98169 25.2349 5.18332 21.8716 6.1416C21.4733 6.2549 21.0583 6.02422 20.9448 5.62598C20.8315 5.22771 21.0632 4.81269 21.4614 4.69922ZM24.7485 9.2041C26.3021 8.89485 28.0332 9.43615 29.2983 10.7012C30.5636 11.9664 31.1049 13.6982 30.7954 15.252C30.7144 15.6579 30.3196 15.9215 29.9136 15.8408C29.5075 15.7599 29.2431 15.3651 29.3237 14.959C29.5271 13.938 29.1796 12.7035 28.2378 11.7617C27.2961 10.8202 26.0624 10.4726 25.0415 10.6758C24.6353 10.7567 24.2397 10.493 24.1587 10.0869C24.0778 9.68068 24.3423 9.28501 24.7485 9.2041Z"
								fill="currentColor" />
						</svg>
					</a>
					<button class="header__burger-btn burger-btn visible-tablet" type="button"
						aria-label="Меню"><span></span></button></nav>
				</div>
			</div>
			<div class="header__bottom">
				<div class="container header__bottom-container">
					<h3 class="header__news-title">
						<?php echo esc_html($news['title']) ?>
					</h3>
					<a class="header__news-btn btn" href="<?php echo esc_url($news['link']['url']) ?>">
						<?php echo esc_html($news['link']['title']) ?>
					</a>
				</div>
			</div>
		</header>
		<main class="main">
			<?php
			if (
				!is_front_page() && !is_404() && !is_page('thank-you') && !is_page('shop') && !is_product() ): ?>

				<?php get_template_part('partials/hero-page'); ?>

			<?php endif; ?>