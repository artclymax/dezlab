<?php get_header(); ?>


<?php get_template_part('partials/reviews-benefits') ?>

<?php get_template_part('partials/reviews') ?>

<?php get_template_part('partials/block', null, ['page' => get_page_by_path('reviews')]) ?>

<?php get_footer(); ?>