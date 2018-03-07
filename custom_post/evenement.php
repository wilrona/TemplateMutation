<?php
add_action( 'init', 'event_post_type' );
function event_post_type() {
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' 				=> 'Évènements',
                'singular_name' 	=> 'Évènement',
                'menu_name'         => 'Agenda',
                'all_items'         => 'Évènements',
                'view_item'         => 'Voir',
                'add_new_item'      => 'Ajouter évènement',
                'add_new'           => 'Ajouter',
                'edit_item'         => 'Modifier l\'évènement',
                'update_item'       => 'Mettre à jour',
                'search_items'      => 'Chercher',
                'not_found'         => 'Aucun évènement',
                'not_found_in_trash'=> 'Aucun évènement dans la corbeille',
            ),
            'public' 			  => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'menu_icon' 		  => 'dashicons-calendar',
            'supports'            => array( 'title', 'editor', 'thumbnail', 'comments'),
            'rewrite'             => array( 'slug' => 'agenda'),
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true
        )
    );
    flush_rewrite_rules();
}

function ep_eventposts_metaboxes() {
    add_meta_box( 'ept_event_date_start', 'Début de l\'évènement', 'ept_event_date', 'events', 'side', 'default', array( 'id' => '_start') );
    add_meta_box( 'ept_event_date_end', 'Fin de l\'évènement', 'ept_event_date', 'events', 'side', 'default', array('id'=>'_end') );
    add_meta_box( 'ept_event_location', 'Lieu de l\'évènement', 'ept_event_location', 'events', 'side', 'default', array('id'=>'_location') );
}
add_action( 'admin_init', 'ep_eventposts_metaboxes' );

function ept_event_date($post, $args) {
    $metabox_id = $args['args']['id'];
    global $post, $wp_locale;

    wp_nonce_field( plugin_basename( __FILE__ ), 'ep_eventposts_nonce' );
    $time_adj = current_time( 'timestamp' );
    $event_date = get_post_meta( $post->ID, $metabox_id . '_eventtimestamp', true );

    if ( empty($event_date) ) {
        $month	= gmdate( 'm', $time_adj );
        $day	= gmdate( 'd', $time_adj );
        $year	= gmdate( 'Y', $time_adj );
        $hour	= gmdate( 'H', $time_adj );
        $min 	= '00';
    }
    else {
        $month	= date('m' , $event_date);
        $day	= date('d' , $event_date);
        $year	= date('Y' , $event_date);
        $hour	= date('H' , $event_date);
        $min	= date('i' , $event_date);
    }

    $month_s = '<select name="' . $metabox_id . '_month">';
    for ( $i = 1; $i < 13; $i = $i +1 ) {
        $month_s .= "\t\t\t" . '<option value="' . zeroise( $i, 2 ) . '"';
        if ( $i == $month )
            $month_s .= ' selected="selected"';
        $month_s .= '>' . $wp_locale->get_month( $i ) . "</option>\n";
    }
    $month_s .= '</select>';

    echo 'Date de l\'évènement:<br><input type="text" name="' . $metabox_id . '_day" value="' . $day  . '" size="2" maxlength="2" />';
    echo $month_s;
    echo '<input type="text" name="' . $metabox_id . '_year" value="' . $year . '" size="4" maxlength="4" /><br><br>';
    echo 'Heure de l\'évènement:<br><input type="text" name="' . $metabox_id . '_hour" value="' . $hour . '" size="2" maxlength="2"/>:';
    echo '<input type="text" name="' . $metabox_id . '_minute" value="' . $min . '" size="2" maxlength="2" />';

}

function ept_event_location() {
    global $post;
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'ep_eventposts_nonce' );
    // The metabox HTML
    $event_location = get_post_meta( $post->ID, '_event_location', true );
    echo '<label for="_event_location">Lieu:</label>';
    echo '<input type="text" name="_event_location" value="' . $event_location  . '" />';
}

// Save the Metabox Data
function ep_eventposts_save_meta( $post_id, $post ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
    if ( !isset( $_POST['ep_eventposts_nonce'] ) )
        return;
    if ( !wp_verify_nonce( $_POST['ep_eventposts_nonce'], plugin_basename( __FILE__ ) ) )
        return;
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ) )
        return;

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though
    $metabox_ids = array( '_start', '_end' );
    foreach ($metabox_ids as $key ) {
        $events_meta[$key . '_month'] 			= $_POST[$key . '_month'];
        $events_meta[$key . '_day'] 			= $_POST[$key . '_day'];
        $events_meta[$key . '_hour'] 			= $_POST[$key . '_hour'];
        $events_meta[$key . '_year'] 			= $_POST[$key . '_year'];
        $events_meta[$key . '_hour'] 			= $_POST[$key . '_hour'];
        $events_meta[$key . '_minute'] 			= $_POST[$key . '_minute'];
        $events_meta_save[$key . '_eventtimestamp'] 	= strtotime($events_meta[$key . '_year'] .'-'. $events_meta[$key . '_month'] .'-'. $events_meta[$key . '_day'] .' '. $events_meta[$key . '_hour'].':'.$events_meta[$key . '_minute'].':00');
    }
    $events_meta_save['_event_location'] = $_POST['_event_location'];

    // Add values of $events_meta as custom fields
    foreach ( $events_meta_save as $key => $value ) { // Cycle through the $events_meta array!
        if ( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode( ',', (array)$value ); // If $value is an array, make it a CSV (unlikely)
        if ( get_post_meta( $post->ID, $key, false ) ) { // If the custom field already has a value
            update_post_meta( $post->ID, $key, $value );
        } else { // If the custom field doesn't have a value
            add_post_meta( $post->ID, $key, $value );
        }
        if ( !$value ) delete_post_meta( $post->ID, $key ); // Delete if blank
    }
}
add_action( 'save_post', 'ep_eventposts_save_meta', 1, 2 );

// ADD COLUMNS POST TYPE ADMIN AREA
/* Création de la colonne */
add_filter('manage_events_posts_columns', 'posts_columns_events', 10, 1);
function posts_columns_events($columns){
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'event_date' => 'Date de l\'évènement',
        'event_statut' => 'Statut',
        'comments' =>  '<span class="vers comment-grey-bubble" title="' . esc_attr__( 'Comments' ) . '"><span class="screen-reader-text">' . __( 'Comments' ) . '</span></span>',
        'author' => __('Author'),
    );
    return $columns;
}

add_action('manage_events_posts_custom_column', 'posts_custom_columns_events', 5, 2);
function posts_custom_columns_events($column_name, $post_id){
    $current_date = current_time( 'timestamp', true );
    $event_date = get_post_meta($post_id,'_start_eventtimestamp', true);
    if($column_name === 'event_date'){
        echo date('d/m/Y' , $event_date);
    }
    if($column_name === 'event_statut'){
        if ($event_date > $current_date ) echo 'Prochainement';
        else echo 'Terminé';
    }
}

/* Trier la colonne */
add_filter( 'manage_edit-events_sortable_columns', 'posts_column_register_sortable_events' );
function posts_column_register_sortable_events( $columns ) {
    $columns['event_date'] = 'event_date';
    $columns['event_statut'] = 'event_statut';
    $columns['author'] = 'author';
    return $columns;
}
?>