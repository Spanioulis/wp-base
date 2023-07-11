<?php

    // -------------------
    // DISABLE GUTENBERG
    // -------------------
    
    add_filter('use_block_editor_for_post', '__return_false'); // all post types


    // // -------------------
    // // WYSIWYG EDITOR CUSTOMIZATION
    // // -------------------

    // add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
    // function my_toolbars( $toolbars )
    // {

    //     // remove the 'Basic' toolbar completely (if you want)
	//     unset( $toolbars[ 'Full' ] );

    //     // superscript and subscript buttons in Editor
    //     $toolbars[ 'Basic' ][1][] = 'superscript';
    //     $toolbars[ 'Basic' ][1][] = 'subscript';
    //     // $toolbars['Full' ][1][] = 'superscript';
    //     // $toolbars['Full' ][1][] = 'subscript';

    //     // create new and add extra capabilities
    //     $toolbars[ 'Basic + H2' ] = $toolbars[ 'Basic' ];
    //     $toolbars[ 'Basic + H2' ][1][] = 'formatselect';

    //     // return $toolbars - IMPORTANT!
    //     return $toolbars;
    // }


    // // /*
    // // * Add columns to post list
    // // https://stackoverflow.com/questions/53649181/acf-cant-get-title-from-relation-field-post-object-within-post-loop
    // // */
    // // function add_acf_columns ( $columns ) {

    // //     return array_merge ( $columns, array ( 
    // //         'servicios' => __ ( 'Servicios' ),
    // //     ) );
    // // }
    // // add_filter ( 'manage_proyecto_posts_columns', 'add_acf_columns' );


    // // ----------------------
    // // OPTIONS PAGE
    // // ----------------------

    // /**
    //  * @snippet       Advanced Custom Fields: Opciones básicas para las páginas de opciones.
    //  * @author        Oscar Abad Folgueira
    //  * @author_url    https://www.oscarabadfolgueira.com
    //  * @snippet_url   https://oscarabadfolgueira.com/como-crear-una-pagina-de-opciones-en-wordpress-con-advaced-custom-fields-de-basico-a-avanzado
    //  */

    // add_action('acf/init', 'pagina_opciones');

    // function pagina_opciones() {

    //     // Comprobar si existe la función acf_add_options_page
    //     if( function_exists('acf_add_options_page') ) {

    //             $option_page = acf_add_options_page(array(
                        // 'page_title'    	=> 'Contenido adicional',
                        // 'menu_title'    	=> 'Contenido adicional',
                        // 'menu_slug'     	=> 'contenido-adicional',
                        // 'capability'    	=> 'edit_posts',
                        // 'position' 		    => '35',
                        // 'icon_url' 		    => 'dashicons-clipboard',
                        // 'update_button' 	=> 'Actualizar',
                        // 'updated_message' 	=> 'Los datos se han guardado',
                        // 'redirect'      	=> false
    //             ));
    //     }
    // }


    // // ----------------------
    // // MENU LOCATIONS
    // // ----------------------

    // function register_my_menus()
    // {
    //   register_nav_menus(
    //     array(
    //       'header-menu' => __('Header menu'),
    //       'footer-menu' => __('Footer menu'),
    //       'footer-legal' => __('Footer legal'),
    //     )
    //   );
    // }
    // add_action('init', 'register_my_menus');


    // // ----------------------
    // // CATEGORY FILTERS
    // // ----------------------

    // function filter_projects() {

    //   // get category id's
    //   $catIDs = $_POST['categories'];

    //   // if filters are selected, set category condition
    //   if ($catIDs) {
    //     $ID_array = explode(',', $catIDs);
    //     $ajaxposts = new WP_Query([
    //       'post_type' => 'post',
    //       'category__in' => $ID_array,
    //       's' => esc_attr( $_POST['keyword'] )
    //     ]);

    //   // otherwise display all results
    //   } else {
    //     $ajaxposts = new WP_Query([
    //       'post_type' => 'post',
    //       's' => esc_attr( $_POST['keyword'] )
    //     ]);
    //   }

    //   // build response from query
    //   $response = '';
    //   if($ajaxposts->have_posts()) {
    //     while($ajaxposts->have_posts()) : $ajaxposts->the_post();
    //       $response .= get_template_part('template_components/card-blog', null, array( 'result' => true ));
    //     endwhile;
    //   } else {
    //     $response = '<h2 class="s1__noresults">'.__('No se han encontrado resultados con tus criterios.','prewaste_theme').'</h2>';
    //   }

    //   // add newsletter blog
    //   $response .= get_template_part('template_components/newsletter-blog');

    //   // return response to ajax
    //   echo $response;
    //   exit;

    // }
    // add_action('wp_ajax_filter_projects', 'filter_projects');
    // add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');


    /**
    * Allow additional MIME types
    * Use 'text/plain' instead of 'application/json' for JSON because of a current Wordpress core bug
    */

    function add_upload_mimes( $types ) { 
        $types['json'] = 'text/plain';
        return $types;
    }
    add_filter( 'upload_mimes', 'add_upload_mimes' );
    
?>


