<?php
class BS3_Walker_Nav_Menu_mobile extends Walker_Nav_Menu
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
            if($item->xfn){
                $classes[] .= 'menu-item-has-children';
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

        $after = '';
        if( in_array( 'menu-taxonomylist', $classes ) ) {
            if($item->xfn){
                $attributes .= 'class="td-link-element-after"';
                $after = '<i class="td-icon-menu-right td-element-after"></i>';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= $after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        if( in_array( 'menu-taxonomylist', $classes )) {

            $taxonomy = ! empty( $item->xfn ) ? $item->xfn : 'category';
            // Variable avec le get_terms
            $tax_terms = get_terms($taxonomy, array('hide_empty' => false));
//                var_dump($tax_terms);
//                die();
            if($tax_terms) {
                $item_output .= $args->before;
                $item_output .= '<ul class="sub-menu">';
                // c'est ici qu'il faut appliquer la recuperation des classes et de xfn

                foreach ($tax_terms as $tax_term):

                    $item_output .= $args->link_before . '<li><a href="' . esc_attr(get_term_link($tax_term->slug, $taxonomy)) . '">' . ucfirst(strtolower($tax_term->name)) . '</a></li>' . $args->link_after;

                endforeach;

                $item_output .= '</ul>';
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