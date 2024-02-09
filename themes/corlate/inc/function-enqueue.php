<?php
/** * Completely Remove jQuery From WordPress */
// function my_init() {
//     if (!is_admin()) {
//         wp_deregister_script('jquery');
//         wp_register_script('jquery', false);
//     }
// }
// add_action('init', 'my_init');
//Function to load the stylesheets and scripts, runs because of add_action
function wp_style_and_script()
{
    // Actually load up the stylesheet.
    // Enqueue style.
    wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('font-awesome-min', get_template_directory_uri() . '/css/font-awesome.min.css', array(), false, 'all');
    wp_enqueue_style('animate-min', get_template_directory_uri() . '/css/animate.min.css', array(), false, 'all');
    wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', array(), false, 'all');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    // wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome.css', array(), false, 'all');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), false, 'all');

    // Enqueue js files.
    //wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', '', '1.10.2', false);
    wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('jquery-prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), _S_VERSION, true);
    wp_enqueue_script('jquery-isotope-min', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('wow-min', get_template_directory_uri() . '/js/wow.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
    // wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', '', 1.0, true);
    // wp_enqueue_script('respond-min', get_template_directory_uri() . '/js/respond.min.js', '', 1.0, true);
}
//This line runs our function when WordPress hits the wp_enqueue_script milestone of loading
add_action('wp_enqueue_scripts', 'wp_style_and_script');

// function enqueue_font_awesome() {
//     wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css' );
// }
// add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
?>