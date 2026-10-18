<?php get_header(); ?>

<?php get_template_part('partials/archive-certificates') ?>
<?php get_template_part('partials/block', null, ['page' => get_page_by_path('certificates')]) ?>

<?php get_footer(); ?>