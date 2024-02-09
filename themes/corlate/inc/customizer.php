<?php
/**
 * corlate Theme Customizer
 *
 * @package corlate
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corlate_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector' => '.site-title a',
				'render_callback' => 'corlate_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector' => '.site-description',
				'render_callback' => 'corlate_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'corlate_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function corlate_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corlate_customize_preview_js()
{
	$version = wp_get_theme()->get("Version");
	wp_enqueue_script('corlate-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), $version, true);
}
add_action('customize_preview_init', 'corlate_customize_preview_js');

/**
 *Adding a new panel in the customizer
 */
function customize_new_panel($wp_customize)
{
	// Theme Header Panel.
	$wp_customize->add_panel(
		'theme_options',
		array(
			'priority' => 100,
			'title' => __('Theme Options', 'corlate'),
			'description' => __('Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'corlate'),
		)
	);
	// Text Header Section Inside Theme.
	$wp_customize->add_section(
		'header',
		array(
			'title' => __('Header', 'corlate'),
			'priority' => 1,
			'panel' => 'theme_options',
		)
	);
	// Setting for Some text.
	$wp_customize->add_setting(
		'Phn_no',
		array(
			'type' => 'theme_mod',
			'default' => __('Phone no. here', 'corlate'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		)
	);
	// Control for Some text.
	$wp_customize->add_control(
		'Phn_no',
		array(
			'type' => 'text',
			'priority' => 10,
			'section' => 'header',
			'label' => 'Phone Number',
			'description' => 'Phone Number for the top of the page'
		)
	);

	//Settings and Controls for phone logo.
	$wp_customize->add_setting(
		'phn_logo',
		array(
			'type' => 'theme_mod',
			'default' => get_theme_file_uri(''),
			// Add Default Image URL 
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'phn_logo_control',
			array(
				'label' => 'Phone Image',
				'priority' => 20,
				'section' => 'header',
				'settings' => 'phn_logo',
				'button_labels' => array(
					// All These labels are optional
					'select' => 'Select Logo',
					'remove' => 'Remove Logo',
					'change' => 'Change Logo',
				)
			)
		)
	);

	// Text Footer Section Inside Theme.
	$wp_customize->add_section(
		'footer',
		array(
			'title' => __('Footer', 'corlate'),
			'priority' => 1,
			'panel' => 'theme_options',
		)
	);

	// Setting for Footer URL.
	$wp_customize->add_setting(
		'footer_url',
		array(
			'type' => 'theme_mod',
			'default' => __('URL for footer', 'corlate'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		)
	);
	// Control for Footer URL.
	$wp_customize->add_control(
		'footer_url',
		array(
			'type' => 'url',
			'priority' => 10,
			'section' => 'footer',
			'label' => 'Footer URL',
			'description' => 'Footer URL for the bottom of the page'
		)
	);

	// Setting for Footer text.
	$wp_customize->add_setting(
		'footer_text',
		array(
			'type' => 'theme_mod',
			'default' => __('Footer URL Text here', 'corlate'),
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'refresh',
		)
	);

	// Control for rest of the footer text.
	$wp_customize->add_control(
		'footer_text',
		array(
			'type' => 'text',
			'priority' => 10,
			'section' => 'footer',
			'label' => 'Text for the bottom of the page',
			'description' => 'Seperate using commas <br /> Format Example: 2020, Company Name, Hello, Copyright <br /> Reults: 2020 <a> Company Name </a> Hello &copy'
		)
	);

}
add_action('customize_register', 'customize_new_panel');