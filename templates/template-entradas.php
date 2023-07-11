<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
);

$blog_query = new WP_Query($args);

if ($blog_query->have_posts()) :
    $count = 0;
    while ($blog_query->have_posts()) : $blog_query->the_post();
        ?>
        <!-- Card Obra -->
        <div class="post-container">
            <div class="..." style="background-image: url('<?php the_post_thumbnail_url('full'); ?>');">
            </div>
        </div>
        <?php endif;
    endwhile;
    wp_reset_postdata();
else :
    echo 'No hay feeds/posts nuevos.';
endif;
?>
