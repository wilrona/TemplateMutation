<?php
class BS3_Walker_Nav_Menu extends Walker_Nav_Menu
{

    function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        $id_field = $this->db_fields['id'];

        if ( isset( $args[0] ) && is_object( $args[0] ) )
        {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );

        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        if( in_array( 'menu-taxonomylist', $classes )) {

            $taxonomy = ! empty( $item->xfn ) ? $item->xfn : 'category';

            if(is_tax('categorie_laj')):
                if($taxonomy == 'categorie_laj'):
                    global $titre_parent_laj, $url_parent_laj;
                    $titre_parent_laj = $item->title;
                    $url_parent_laj = $item->url;
                    $classes[] .= 'current-menu-item';
                endif;
            endif;

            if(is_tax('categorie_vsd')):
                if($taxonomy == 'categorie_vsd'):
                    global $titre_parent_vsd, $url_parent_vsd;
                    $titre_parent_vsd = $item->title;
                    $url_parent_vsd = $item->url;
                    $classes[] .= 'current-menu-item';
                endif;
            endif;

            if(is_single() && $taxonomy == 'categorie_laj'):
                global $titre_parent_laj, $url_parent_laj;
                $titre_parent_laj = $item->title;
                $url_parent_laj = $item->url;
            endif;

            if(is_single() && $taxonomy == 'categorie_vsd'):
                global $titre_parent_vsd, $url_parent_vsd;
                $titre_parent_vsd = $item->title;
                $url_parent_vsd = $item->url;
            endif;


            // Variable avec le get_terms
            $tax_terms = get_terms($taxonomy, array('hide_empty' => true));
            if($tax_terms){
                $classes[] .= 'td-menu-item td-mega-menu';
            }

        }

        if( in_array( 'menu-custompostlist', $classes )) {

            if (!empty($item->xfn)) {
                $classes[] .= 'td-menu-item td-mega-menu';
            }

        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';


        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url ) ? $item->url : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }


        $item_output = '<a' . $attributes . '>';
        $item_output .=  apply_filters('the_title', $item->title, $item->ID);
        $item_output .= '</a>';

        if( in_array( 'menu-taxonomylist', $classes )) {

            $taxonomy = ! empty( $item->xfn ) ? $item->xfn : 'category';
            // Variable avec le get_terms
            $tax_terms = get_terms($taxonomy, array('hide_empty' => true));
//                var_dump($tax_terms);
//                die();
            if($tax_terms) {
                $item_output .= $args->before;
                $item_output .= '<ul class="sub-menu"><li class="menu-item-0"><div class="td-container-border"><div class="td-mega-grid"><div class="td_block_wrap td_block_mega_menu td_with_ajax_pagination td-pb-border-top">';
                // c'est ici qu'il faut appliquer la recuperation des classes et de xfn

                foreach ($tax_terms as $tax_term):

                    $item_output .= $args->link_before . '<span class="sub-menu-content"><a href="' . esc_attr(get_term_link($tax_term->slug, $taxonomy)) . '">' . ucfirst(strtolower($tax_term->name)) . '</a></span>' . $args->link_after;

                endforeach;

                $item_output .= '</div></div></div></li></ul>';
                $item_output .= $args->after;
            }
        }
        if( in_array( 'menu-custompostlist', $classes )) {

            if(!empty($item->xfn)){
                $arg_2 = array(
                    'post_type' => ['laj', 'vsd'],
                    'posts_per_page' => 5,
                    'order' => 'desc',
                    'meta_query' => array(
                        array(
                            'key'     => $item->xfn,
                            'value'   => null,
                            'compare' => '!=',
                        ),
                    )
                );
                $service_menu = new WP_query($arg_2);
                $item_output .= '<ul class="sub-menu"><li class="menu-item-1"><div class="td-container-border"><div class="td-mega-grid"><div class="td_block_wrap td_block_mega_menu td_uid_15_58590c892edcf_rand td-no-subcats td_with_ajax_pagination td-pb-border-top" data-td-block-uid="td_uid_15_58590c892edcf"><div class="td_block_inner" id="td_uid_15_58590c892edcf"><div class="td-mega-row">';
                // c'est ici qu'il faut appliquer la recuperation des classes et de xfn
                while ($service_menu->have_posts()) :
                    $service_menu->the_post();
                    global $post;


                    $item_output .= '<div class="td-mega-span"><div class="td_module_mega_menu td_mod_mega_menu">';

                    $item_output .= '<div class="td-module-image"><div class="td-module-thumb"><a href="'.get_the_permalink().'" rel="bookmark" title="'.$post->post_title.'">';
                    $item_output .= ''.get_the_post_thumbnail($post->ID, 'image_218x150', array('class' => 'entry-thumb'));

                    $item_output .= '</a></div></div><div class="item-details"><h3 class="entry-title td-module-title">';

                    $item_output .= '<a href="'.get_the_permalink().'" rel="bookmark" title="'.$post->post_title.'">'.$post->post_title.'</a>';
                    $item_output .= '</h3></div>';
                    $item_output .= '</div></div>';

                endwhile;

                $item_output .= '</div></div></div></div></div></li></ul>';
                $item_output .= $args->after;
            }

        }



        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $hidden = '';
        if($depth >= 1){
            $hidden = 'hidden';
        }
        $indent = '';
        if(empty($hidden)){
            $output .= "$indent<ul class=\"sub-menu\">";
        }else{
            $output .= "$indent<ul class=\"sub-menu hidden\">";
        }

    }
}