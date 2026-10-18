<?php
$page = 'options';

$btn = get_field('page_404_btn', $page) ?? '';

?>
<section class="section hero-404" id="hero-404">
	<div class="container hero-404__container">
		<h1 class="hero-404__title title-1">
			<?php the_title(); ?>
		</h1>
		<div class="descr-box hero-404__descr title-3">
			<?php the_content() ?>
		</div>
		<div class="hero-404__form">
			<p>Проверьте правильность данных</p>
			<input class="hero-404__input form-input form-field__input" type="text" placeholder="Имя" value="<?php echo $_GET['text-884'] ?? ''; ?>"
				readonly>
			<input class="hero-404__input form-input form-field__input" type="text" placeholder="Телефон" value="<?php echo $_GET['tel-836'] ?? ''; ?>"
				readonly>
			<a class="btn hero-404__btn" href="<?php echo esc_url(home_url('/')); ?>">
				<?php echo esc_html($btn) ?>
			</a>
		</div>
	</div>
	<div class="hero-404__image-box image-box">
		<?php the_post_thumbnail() ?>
	</div>

</section>