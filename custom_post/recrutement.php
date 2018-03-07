<?php


add_action('init', 'create_post_type_recrutement');

function create_post_type_recrutement(){

    $labels = array(
        'name' => 'Recrutements',
        'singular_name' => 'Recrutement',
        'add_new' => 'Ajouter un recrutement',
        'add_new_item' => 'Ajouter un nouveeau recrutement',
        'edit_item' => 'Editer un recrutement',
        'new_item' => ' Nouveau recrutement',
        'view_item' => 'Voir le recrutement',
        'search_items' => 'Rechercher recrutement',
        'not_found_in_trash' => 'Aucun recrutement dans la corbeille',
        'parent_item_colon' => '',
        'menu_name' => 'Recrutements'
    );

    register_post_type('recrutement', array(
        'public' => true,
        'labels' => $labels,
        'menu_position' => '22',
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        // 'taxonomies' => array( 'category', 'post_tag' ),

        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    ));
}