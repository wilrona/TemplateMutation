<?php

add_action('init', 'create_post_type_video');
function create_post_type_video(){

    $labels = array(
        'name' => 'Articles Video',
        'singular_name' => 'Article Video',
        'add_new' => 'Ajouter un article video',
        'add_new_item' => 'Ajouter un article video',
        'edit_item' => 'Editer un article video',
        'new_item' => ' Nouvel Article Video',
        'view_item' => 'Voir l\'article video',
        'search_items' => 'Rechercher article video',
        'not_found_in_trash' => 'Aucun article video dans la corbeille',
        'parent_item_colon' => '',
        'menu_name' => 'Article Video'
    );

    register_post_type('video', array(
        'public' => true,
        'labels' => $labels,
        'menu_position' => '3',
        'supports' => array('title','editor', 'thumbnail'),
        'hierarchical' => false,
        // 'taxonomies' => array( 'category', 'post_tag' ),

        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    ));

    add_image_size('image_218x150', 218,  150, true);

}