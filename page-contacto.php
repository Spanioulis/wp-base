<?php
/*Template Name: Página de contacto*/
get_header(); ?>

<main class="template-page-contact js-2cp">

    <h1><?= get_the_title(); ?></h1>
    <?= get_the_content(); ?>
    <?= get_field('custom_field'); ?>
    <?= get_field('custom_field'); ?>

</main> 

<?php get_footer(); ?>

  