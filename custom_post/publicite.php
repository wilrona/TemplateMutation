<?php

add_action('init', 'create_post_type_pub');
function create_post_type_pub(){

    $labels = array(
        'name' => 'Publicites',
        'singular_name' => 'Publicite',
        'add_new' => 'Ajouter une publicite',
        'add_new_item' => 'Ajouter une nouvelle publicite',
        'edit_item' => 'Editer une publicite',
        'new_item' => ' Nouvelle publicite',
        'view_item' => 'Voir la publicite',
        'search_items' => 'Rechercher publicite',
        'not_found_in_trash' => 'Aucune publicite dans la corbeille',
        'parent_item_colon' => '',
        'menu_name' => 'Publicité'
    );

    register_post_type('publicite', array(
        'public' => true,
        'labels' => $labels,
        'menu_position' => '71',
        'supports' => array('title', 'thumbnail'),
        'hierarchical' => false,
        // 'taxonomies' => array( 'category', 'post_tag' ),

        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    ));

}