<?php get_header(); ?>

<?php get_template_part('partials/contacts-section'); ?>

<?php get_template_part('partials/dez-product-page-form', null, ['class' => 'contacts-page', 'title' => get_field('contacts_page_form_title', get_page_by_path('contacts')), 'text' => get_field('contacts_page_form_text', get_page_by_path('contacts'))]) ?>

<?php get_template_part('partials/map-section'); ?>

<?php get_footer(); ?>