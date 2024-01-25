<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="description of the website">
    <meta name="author" content="Nombre del autor">

    <title><?php wp_title('·'); ?></title>

    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- contentful-paint.js -->
    <style>
        .js-1cp, .js-2cp, .js-3cp { opacity: 0; }
    </style>
    <!-- contentful-paint.js end -->
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header" class="header js-1cp" role="banner">
        <a class="header__logo" id="logo" href="<?= get_home_url( ); ?>">

        </a>

        <nav class="header__nav" id="nav">
            <?php wp_nav_menu( array('theme_location' => 'main-nav')); ?>
        </nav>
    </header>

