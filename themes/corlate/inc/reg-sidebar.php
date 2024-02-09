<?php
/*function reg_sidebars () {
    register_sidebar(
        array(
        'name' => 'Gallery',
        'id' => 'gallery',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
    ) );
}
add_action( 'widgets_init', 'reg_sidebars' );*/
/* Better way to add multiple widgets areas */
function widget_registration($name, $id, $description, $beforeWidget, $afterWidget, $beforeTitle, $afterTitle)
{
    register_sidebar(
        array(
            'name' => $name,
            'id' => $id,
            'description' => $description,
            'before_widget' => $beforeWidget,
            'after_widget' => $afterWidget,
            'before_title' => $beforeTitle,
            'after_title' => $afterTitle,
        )
    );
}

function multiple_widget_init()
{
    widget_registration('Footer widget', 'w-sidebar', 'footer bar', '<div class="col-md-3 col-sm-6"><div class="widget">', '</div></div>', '<h2>', '</h2>');
    widget_registration('Sidebar (Aside)', 'sidebar-aside', 'aside sidebar', '', '', '', '');
    widget_registration('Gallery', 'gallery', 'Gallery sidebar', '<li>', '</li>', '', '');
    widget_registration('Sidebar 2', 'sidebar-2', 'Sidebar 2', '', '', '', '');
    // ETC...
}

add_action('widgets_init', 'multiple_widget_init');
?>