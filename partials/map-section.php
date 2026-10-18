<?php
$page = get_page_by_path('contacts');
$title = get_field('contacts_page_map_title', $page) ?? '';

?>
<section class="section map-section" id="map-section">
	<div class="container map-section__container">
		<h2 class="map-section__title title-1 mb-l">
			<?php echo esc_html($title) ?>
		</h2>
		<div class="map-section__map">
			<?php the_content(); ?>
		</div>
	</div>
</section>