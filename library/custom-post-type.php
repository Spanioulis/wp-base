<?php
/* Bones Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

function create_custom_taxonomies() {
    register_taxonomy( 'tipo', ['entidades' ], array(
        'label'        => __( 'Tipo', 'textdomain' ),
        'rewrite'      => array( 'slug' => 'tipo' ),
		'show_admin_column' => true,
        'hierarchical' => true,
		'labels'       => array(
			'name'              => _x( 'Tipos', 'taxonomy general name' ),
			'singular_name'     => _x( 'Tipo', 'taxonomy singular name' ),
			'search_items'      => __( 'Buscar Tipos' ),
			'all_items'         => __( 'Todos los Tipos' ),
			'parent_item'       => __( 'Tipo Superior' ), // only needed if hierarchical
			'parent_item_colon' => __( 'Tipo Superior:' ), // only needed if hierarchical
			'edit_item'         => __( 'Editar Tipo' ),
			'update_item'       => __( 'Actualizar Tipo' ),
			'add_new_item'      => __( 'Añadir Nuevo Tipo' ),
			'new_item_name'     => __( 'Nombre del Nuevo Tipo' ),
			'menu_name'         => __( 'Tipo' ),
		)
    ) );
}
add_action( 'init', 'create_custom_taxonomies', 0 );

// -------------------------
// Define custom post types
// -------------------------
function register_custom_types() {
	register_post_type( 'obres',
		array( 
			'labels' => array(
				'name'				=> __( 'Obres', 'maneko_theme' ),
				'singular_name'		=> __( 'Obra', 'maneko_theme' ),
				'all_items'			=> __( 'Todas las Obres', 'maneko_theme' ),
				'add_new'			=> __( 'Añadir nuevo', 'maneko_theme' ),
				'add_new_item'		=> __( 'Añadir nueva Obra', 'maneko_theme' ),
				'edit'				=> __( 'Editar', 'maneko_theme' ),
				'edit_item'			=> __( 'Editar Obra', 'maneko_theme' ),
				'new_item'			=> __( 'Nueva Obra', 'maneko_theme' ),
				'view_item'			=> __( 'Ver Obra', 'maneko_theme' ),
				'search_items'		=> __( 'Buscar Obres', 'maneko_theme' ),
				'parent_item_colon' => ''
			),
			'public'				=> true,
			'publicly_queryable'	=> true,
			'exclude_from_search'	=> false,
			'show_ui'				=> true,
			'query_var'				=> true,
			'capability_type'		=> 'post',
			'hierarchical'			=> true,
			'supports'				=> array( 'title','thumbnail'),
			'has_archive'			=> false,
			'rewrite'				=> array( 'slug' => 'obres' , 'with_front' => false ),
			'menu_icon'				=> 'dashicons-format-status',
			'taxonomies'			=> array ('featured') // in case you want to add custom taxonomies
		)
	);
}
add_action( 'init', 'register_custom_types');


// // -------------------------
// // Customize default posts
// // -------------------------

// function registrar_cursos() {
// 	global $wp_post_types;

// 	$wp_post_types['post']->label = __( 'Cursos', 'theme_admin' );

// 	$labels = &$wp_post_types['post']->labels;
// 	$labels->name = __( 'Cursos', 'theme_admin' );
// 	$labels->singular_name = __( 'Curso', 'theme_admin' );
// 	$labels->add_new = _x( 'Añadir nuevo', 'Curso', 'theme_admin' );
// 	$labels->add_new_item = __( 'Añadir nuevo Curso', 'theme_admin' );
// 	$labels->edit_item = __( 'Editar Curso', 'theme_admin' );
// 	$labels->new_item = __( 'Nuevo Curso', 'theme_admin' );
// 	$labels->view_item = __( 'Ver Curso', 'theme_admin' );
// 	$labels->view_items = __( 'Ver Cursos', 'theme_admin' );
// 	$labels->search_items = __( 'Buscar Cursos', 'theme_admin' );
// 	$labels->menu_name = __( 'Cursos', 'theme_admin' );
// 	$labels->items_list = __( 'Lista de Cursos', 'theme_admin' );
// 	$labels->not_found = __( 'No se han encontrado Cursos', 'theme_admin' );
// 	$labels->not_found_in_trash = __( 'No hay Cursos en la Papelera', 'theme_admin' );
// 	$labels->all_items = __( 'Todos los Cursos', 'theme_admin' );
// 	$labels->name_admin_bar = __( 'Curso', 'theme_admin' );
// }

// add_action( 'init', 'registrar_cursos' );

// function remove_cursos_support(){
//     remove_post_type_support('post','editor');
//     remove_post_type_support('post','thumbnail');
//     remove_post_type_support('post','excerpt');
//     remove_post_type_support('post','page-attributes');
//     remove_post_type_support('post','trackbacks');
//     remove_post_type_support('post','comments');
//     remove_post_type_support('post','post_tags');

// }
// add_action('init','remove_cursos_support');

// function add_cursos_support(){
//     add_post_type_support('post','title');
// }
// add_action('init','add_cursos_support');



// // -------------------------
// // Customize post tags
// // -------------------------

// function custom_post_tags()
// {
//     global $wp_taxonomies;

//     // The list of labels we can modify comes from
//     //  http://codex.wordpress.org/Function_Reference/register_taxonomy
//     //  http://core.trac.wordpress.org/browser/branches/3.0/wp-includes/taxonomy.php#L350
//     $wp_taxonomies['post_tag']->labels = (object)array(
//         'name' => 'Especializaciones',
//         'name_field_description' => '',
//         'slug_field_description' => '',
//         'desc_field_description' => '',
//         'menu_name' => 'Especializaciones',
//         'singular_name' => 'Especialización',
//         'search_items' => 'Busca especializaciones',
//         'popular_items' => 'Especializaciones populares',
//         'all_items' => 'Todas las especializaciones',
//         'parent_item' => null, // Especializaciones aren't hierarchical
//         'parent_item_colon' => null,
//         'edit_item' => 'Editar especialización',
//         'update_item' => 'Actualizar especialización',
//         'add_new_item' => 'Añadir nueva especialización',
//         'new_item_name' => 'Nuevo nombre de la especialización',
//         'separate_items_with_commas' => 'Separar las especializaciones con comas',
//         'add_or_remove_items' => 'Añadir o quitar especializaciones',
//         'choose_from_most_used' => 'Escoge entre las especializaciones más utilizadas',
// 		'items_list_navigation' => 'Navegar por las especializaciones', 
//         'items_list'            => 'Lista de especializaciones',
  
// 		'view_item'                  => 'Ver especialización',
// 		'not_found'                  => 'No se han encontrado especializaciones',
// 		'no_terms'                   => 'No hay especializaciones',
// 		'filter_by_item'             => 'Filtrar por especialización',
// 		'most_used'                  => 'Más utilizadas',
// 		'back_to_items'              => 'Volver a las especializaciones',
// 		'item_link'                  => 'item link',
// 		'item_link_description'      => 'item link description',
//     );

//     $wp_taxonomies['post_tag']->label = 'Especializaciones';
// }
// add_action( 'init', 'custom_post_tags');

?>
