<?php get_header(); ?>

	<main id="main" class="js-2cp" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

		<section class="search">

			<h1><?= __('No se ha encontrado la página.','theme'); ?></h1>

			<p>
				<?= __('No encontramos el contenido que buscas en esta dirección. Por favor revisa la URL del navegador.','theme'); ?>
			</p>

		</section>

		<section class="search">

				<p><?php get_search_form(); ?></p>

		</section>

	</main>

<?php get_footer(); ?>
