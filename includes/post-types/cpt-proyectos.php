<?php
/**
 * CPT Proyectos
 *
 * @package    WordPress
 * @author     Angie Mulero <angie@close.marketing>
 * @copyright  2022 Closemarketing
 * @version    1.0
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'cmkmn_cpt_proyecto' );
/**
 * Register Post Type POST Empresas
 *
 * @return void
 **/
function cmkmn_cpt_proyecto() {
	$labels = array(
		'name'               => __( 'Proyectos', 'reformasadt' ),
		'singular_name'      => __( 'Proyecto', 'reformasadt' ),
		'add_new'            => __( 'Añadir Nueva proyecto', 'reformasadt' ),
		'add_new_item'       => __( 'Añadir Nueva proyecto', 'reformasadt' ),
		'edit_item'          => __( 'Editar proyecto', 'reformasadt' ),
		'new_item'           => __( 'Nueva proyecto', 'reformasadt' ),
		'view_item'          => __( 'Ver proyecto', 'reformasadt' ),
		'search_items'       => __( 'Buscar proyectos', 'reformasadt' ),
		'not_found'          => __( 'No se han encontrado proyectos', 'reformasadt' ),
		'not_found_in_trash' => __( 'No se han encontrado proyectos en la papelera', 'reformasadt' ),
	);
	$args   = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_rest'       => true, // Adds gutenberg support.
		'query_var'          => true,
		'rewrite'            => true,
		'has_archive'        => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_position'      => 8,
		'menu_icon'          => 'dashicons-welcome-learn-more', // https://developer.wordpress.org/resource/dashicons/.
		'supports'           => array( 'title', 'thumbnail', 'excerpt', 'revisions', 'editor' ),
	);
	register_post_type( 'proyecto', $args );
}


add_action( 'init', 'cmk_register_tax_categoria', 0 );
function cmk_register_tax_categoria() {

	$labels = array(
		'name'          => 'Categoría del proyecto',
		'singular_name' => 'Categoría',
		'search_items'  => 'Buscar categoría',
		'all_items'     => 'Todas las categorías',
		'edit_item'     => 'Editar categoría',
		'update_item'   => 'Actualizar categoría',
		'add_new_item'  => 'Añadir nueva categoría',
		'new_item_name' => 'Nueva categoría',
	);

	register_taxonomy(
		'categoria',
		array( 'proyecto' ),
		array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'has_archive'       => true,
			'show_in_rest'      => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'categoria' ),
		)
	);
}