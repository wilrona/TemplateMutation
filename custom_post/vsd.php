<?php

add_action('init', 'create_post_type_vsd');
function create_post_type_vsd(){

    $labels = array(
        'name' => 'Mutation VSD',
        'singular_name' => 'Article',
        'add_new' => 'Ajouter un article',
        'add_new_item' => 'Ajouter un nouvel article',
        'edit_item' => 'Editer un article',
        'new_item' => ' Nouvel article',
        'view_item' => 'Voir l\'article',
        'search_items' => 'Rechercher article',
        'not_found_in_trash' => 'Aucun produit dans la corbeille',
        'parent_item_colon' => '',
        'menu_name' => 'Mutation VSD'
    );

    register_post_type('vsd', array(
        'public' => true,
        'labels' => $labels,
        'menu_position' => '22',
        'supports' => array('title', 'editor', 'thumbnail','author','comments'),
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
    register_taxonomy('categorie_vsd', 'vsd', array(
        'show_in_nav_menus' => false,
        'hierarchical' => true,
        'label' => 'Categorie VSD',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'catetogie-vsd','with_front' => false)
    ));

    register_taxonomy('zone_vsd', 'vsd', array(
        'show_in_nav_menus' => false,
        'hierarchical' => true,
        'label' => 'ZONE VSD',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'zonevsd')
    ));

    add_image_size('image_534x462', 534,  462, true);
    add_image_size('image_300x260', 300,  260, true);
    add_image_size('image_696x604', 696,  604, true);
    add_image_size('image_484x420', 484,  420, true);

    add_image_size('image_533x261', 533,  261, true);
    add_image_size('image_265x198', 265,  198, true);
    add_image_size('image_324x235', 324,  235, true);
    add_image_size('image_100x70', 100,  70, true);
    add_image_size('image_324x160', 324,  160, true);
    add_image_size('image_218x150', 218,  150, true);

    function allowAuthorEditing_2()
    {
        add_post_type_support( 'vsd', 'author' );
    }

    add_action('init','allowAuthorEditing_2');
}