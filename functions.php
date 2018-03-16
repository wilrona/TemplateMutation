<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/01/2017
 * Time: 12:43
 */


// Menus de navigation
register_nav_menus(array(
	'header' => 'Menu principal',
));

//add_filter('wp_nav_menu_items', 'gkp_add_index_link', 10, 2);
//function gkp_add_index_link($items, $args) {
//	$homeLink = '';
//	if( $args->theme_location == 'header')
//		$homeLink .= '<li><a href="' . home_url() . '">Accueil</a></li>';
//
//	return $homeLink . $items;
//}


include ('yoomee-ui/yoomee-ui.php');

include( 'framework/init.php' );

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

/* suppression de la barre d'administration sur le template */
add_filter('show_admin_bar','__return_false');


# ajout des elements css et js dans mon template
function themeprefix_bootstrap_modals() {

	wp_register_script ( 'customjs' , get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), '1', true );
//	wp_register_script ( 'jquerymigration' , get_stylesheet_directory_uri() . '/js/jquery.migration.js', '', '1', true );
	wp_register_script ( 'tagdiv_theme' , get_stylesheet_directory_uri() . '/js/tagdiv_theme.min.js', '', '1', true );
	wp_register_script ( 'bootstrapjs' , get_stylesheet_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '1', true );
	wp_register_script ( 'customsjs' , get_stylesheet_directory_uri() . '/js/customs.js', '', '1.4', true );
	wp_register_script ( 'filedownload' , get_stylesheet_directory_uri() . '/js/filedownload.js', '', '1.1', true );
	wp_register_script ( 'jquery.dataTable' , get_stylesheet_directory_uri() . '/js/jquery.dataTable.js', '', '1', true );
	wp_register_script ( 'dataTable.bootstrap' , get_stylesheet_directory_uri() . '/js/dataTables.bootstrap.js', '', '1', true );

	wp_register_style ( 'bootstrapcss' , get_stylesheet_directory_uri() . '/css/bootstrap.css', '' , '', 'all' );
    wp_register_style ( 'custom' , get_stylesheet_directory_uri() . '/css/custom.css', '' , '1.1', 'all' );
    wp_register_style ( 'dataTable' , get_stylesheet_directory_uri() . '/css/dataTable.css', '' , '1.1', 'all' );

//    wp_enqueue_script( 'jquerymigration' );
    wp_enqueue_script( 'customjs' );
    wp_enqueue_script( 'tagdiv_theme' );
    wp_enqueue_script( 'bootstrapjs' );
    wp_enqueue_script( 'customsjs' );
    wp_enqueue_script( 'filedownload' );
    wp_enqueue_script( 'jquery.dataTable' );
    wp_enqueue_script( 'dataTable.bootstrap' );

	wp_enqueue_style( 'bootstrapcss' );
    wp_enqueue_style( 'dataTable' );
    wp_enqueue_style( 'custom' );
}

add_action( 'wp_enqueue_scripts', 'themeprefix_bootstrap_modals');

// Class pour traduire la date de l'anglais vers le francais
class DateTimeFrench extends DateTime {
	public function format($format) {
		$english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
		$french_days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
		$english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Décember');
		$french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
		return str_replace($english_months, $french_months, str_replace($english_days, $french_days, parent::format($format)));
	}
}

$date = date('Y-m-d',time());
$DTZ = new DateTimeZone('Europe/Paris');
$GLOBALS['DT']  = new DateTimeFrench($date, $DTZ);


// Creation d'une page admin pour ajouter
add_action('admin_menu', 'mes_infos');

function mes_infos(){
	add_menu_page('Mes Infos', 'Mes Infos', 'activate_plugins','contact_info_id', 'contact_render_panel', null, 31);
}

function contact_render_panel(){
	if (isset($_POST['contact_update'])) {
		if(!wp_verify_nonce($_POST['contact_noncename'], 'contact_infos')){
			die('aucun accès');
		}

		foreach ($_POST['options'] as $key => $value) {
			if (empty($value)) {
				delete_option($key);
			}else{
				update_option($key, $value);
			}

		}
	}
	require('admin/tpl-infos.php');
}

require('admin/walker-mobile-menu.php');
require('admin/walker-descktop-menu.php');


function remove_submenu() {
    global $submenu;
    global $menu;
    unset($menu[5]);
}
add_action('admin_head', 'remove_submenu');

require('custom_post/evenement.php');
//require('custom_post/recrutement.php');
require('custom_post/laj.php');
require('custom_post/vsd.php');
require('custom_post/publicite.php');
//require('custom_post/shop.php');
require ('custom_post/abonnement.php');


require('admin/abonnee.php');


require('functions/page_for_archive.php');


function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', ['laj', 'vsd', 'events']);
    }
    return $query;
}

add_filter('pre_get_posts','SearchFilter');

/*
|-----------------------------------------------------------------------
| Sky Date in French by Matt - www.skyminds.net
|-----------------------------------------------------------------------
|
| Returns or echoes the date in French format (dd/mm/YYYY) for WordPress themes.
|
*/
function sky_date_french($format, $timestamp = null, $echo = null) {
    $param_D = array('', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
    $param_l = array('', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    $param_F = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    $param_M = array('', 'Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc');
    $return = '';
    if(is_null($timestamp)) { $timestamp = mktime(); }
    for($i = 0, $len = strlen($format); $i < $len; $i++) {
        switch($format[$i]) {
            case '\\' : // fix.slashes
                $i++;
                $return .= isset($format[$i]) ? $format[$i] : '';
                break;
            case 'D' :
                $return .= $param_D[date('N', $timestamp)];
                break;
            case 'l' :
                $return .= $param_l[date('N', $timestamp)];
                break;
            case 'F' :
                $return .= $param_F[date('n', $timestamp)];
                break;
            case 'M' :
                $return .= $param_M[date('n', $timestamp)];
                break;
            default :
                $return .= date($format[$i], $timestamp);
                break;
        }
    }
    if(is_null($echo)) { return $return;} else { echo $return;}
}


function wpb_set_post_views($postID) {

    $count_key = 'wpb_post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        $count = 0;

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

    }else{

        $count++;

        update_post_meta($postID, $count_key, $count);

    }

}

//To keep the count accurate, lets get rid of prefetching

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_get_post_views($postID){

    $count_key = 'wpb_post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

        return "0";

    }

    return $count;

}


function custom_pagination($numpages = '', $pagerange = '', $paged='') {

    if (empty($pagerange)) {
        $pagerange = 2;
    }

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if(!$numpages) {
            $numpages = 1;
        }
    }


    $pagination_args = array(
        'base'            => get_pagenum_link(1) . '%_%',
        'format'          => 'page/%#%',
        'total'           => $numpages,
        'current'         => $paged,
        'show_all'        => False,
        'end_size'        => 1,
        'mid_size'        => $pagerange,
        'prev_next'       => True,
        'prev_text'       => __('«'),
        'next_text'       => __('»'),
        'type'            => 'plain',
        'add_args'        => false,
        'add_fragment'    => ''
    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        echo '<div class="page-nav td-pb-padding-side">';
        echo $paginate_links;
        echo '<span class="pages">Page '. $paged . ' sur '. $numpages .'</span><div class="clearfix"></div></div>';
    }

}


// filter
//function my_posts_where( $where ) {
//
//    $where = str_replace("meta_key = 'dates_%", "meta_key LIKE 'dates_%", $where);
//
//    return $where;
//}
//
//add_filter('posts_where', 'my_posts_where');


if ( function_exists( 'add_image_size' ) ) {
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
}
add_filter('image_size_names_choose', 'my_image_sizes');

function my_image_sizes($sizes) {
    $addsizes = array(
        "image_534x462" => 'image_534x462',
        "image_300x260" => 'image_300x260',
        "image_696x604" => 'image_696x604',
        "image_484x420" => 'image_484x420',
        "image_533x261" => 'image_533x261',
        "image_265x198" => 'image_265x198',
        "image_324x235" => 'image_324x235',
        "image_100x70" => 'image_100x70',
        "image_324x160" => 'image_324x160',
        "image_218x150" => 'image_218x150',
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}


require ('admin/DataBase.php');
require ('admin/insert_user.php');

tr_frontend();



