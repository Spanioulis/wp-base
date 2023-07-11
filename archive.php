<?php get_header(); ?>

<main class="template-archive js-2cp">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <p><?= get_the_title(); ?></p>
	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


</main> 

<?php get_footer(); ?>

  