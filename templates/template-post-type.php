<?php
$args = array(
    'post_type' => 'obres',
   //  'posts_per_page' => -1,
   //  'meta_key' => 'fecha_post',
   //  'orderby' => 'meta_value',
   //  'order' => 'DESC',
);

$blog_query = new WP_Query($args);

if ($blog_query->have_posts()) :
    while ($blog_query->have_posts()) : $blog_query->the_post();
        ?>
        <!-- Contenido del post, "obra", "speaker", etc. -->
         <?php
    endwhile;
    wp_reset_postdata();
else :
    echo 'No hay obras programadas.';
endif;
?>
