<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <script>
        document.getElementsByTagName('header')[0].classList.add('js-fcp');
        document.getElementsByTagName('main')[0].classList.add('js-scp');
    </script>

<?php 
    $home_id = get_option( 'page_on_front' );
    $thumbnail_url = get_the_post_thumbnail_url( $home_id );
?>

    <header id="header" class="header" role="banner">
        <nav class="header__nav" id="nav">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/img/..."></a>
      
          <div>
              <a href="#">Nav 1</a>
              <a href="#">Nav 2</a>
          </div>  
        </nav>
    </header>


