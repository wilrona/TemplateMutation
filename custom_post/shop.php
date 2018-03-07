<?php


add_action('init', 'create_post_type_shop');

function create_post_type_shop(){

    $labels = array(
        'name' => 'Journaux',
        'singular_name' => 'Journal',
        'add_new' => 'Ajouter un journal',
        'add_new_item' => 'Ajouter un nouvel journal',
        'edit_item' => 'Editer un journal',
        'new_item' => ' Nouvel journal',
        'view_item' => 'Voir le journal',
        'search_items' => 'Rechercher journal',
        'not_found_in_trash' => 'Aucun journal dans la corbeille',
        'parent_item_colon' => '',
        'menu_name' => 'Journal'
    );

    register_post_type('shop', array(
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

    add_image_size('image_300x300', 300,  380, true);


}