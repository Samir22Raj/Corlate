<?php
    function add_nav_menus() {
        register_nav_menus( array(
            'Top_Bar' => 'Top Bar Menu',
            'Company' => 'Company Menu',
            'Support' => 'Support Menu',
            'Developers' => 'Developers Menu',
            'Partners' => 'Partners Menu',
            'Final_footer' => 'Final Footer Menu'
        ));
    }
    add_action('init', 'add_nav_menus');

    function wpdocs_add_menu_parent_class( $items ) {
        $parents = array();
    
        // Collect menu items with parents.
        foreach ( $items as $item ) {
            if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
                $parents[] = $item->menu_item_parent;
            }
        }
    
        // Add class.
        foreach ( $items as $item ) {
            if ( in_array( $item->ID, $parents ) ) {
                $item->classes[] = 'dropdown';
            }
        }
        return $items;
    }
    add_filter( 'wp_nav_menu_objects', 'wpdocs_add_menu_parent_class' );

    function my_nav_menu_submenu_css_class( $classes ) {
        $classes[] = 'dropdown-menu';
        return $classes;
    }
    add_filter( 'nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class' );
?>
