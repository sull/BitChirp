<?php
//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3

function register_my_menus() 
	{
  	register_nav_menus
  		(
    	array( 'header-menu' => __( 'Header Menu' ),
    	   'side-menu'   => __( 'Side Menu'   )
    	 	)
  		);
	}
	//add_action( 'init', 'register_my_menus' );
	//WHY IS THIS OUT OF THEFUNCTION?

class Walker_custom extends Walker_Nav_Menu 
	{
	function start_el(&$output, $item, $depth, $args) 
		{
		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$id = null;
		$id = null;
		//$output .= $indent . '<li' . $id . $value . $class_names .'>';
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		//$attributes .= ' rel="' . "external". '"';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .' style="padding-right:1.3em;">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	function end_el(&$output, $item, $depth)
		{
		$output .= "\n";

		}
	}

?>