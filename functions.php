<?php
/**
 * Divi child theme functions
 */

//enqueue_styles
function my_theme_enqueue_styles() {
    $parent_style = 'divi-style'; // This is the 'parent-style'.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'divi-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// get the company name for the footer
function jb_get_footer_company_name() {
    $school_name = et_get_option('footer_credit_company');
    return $school_name;
}

// get the company url for the footer
function jb_get_footer_company_url() {
    $school_url = et_get_option('footer_credit_url');
    return $school_url;
}

/* register customiser settings */
function jb_customize_register($wp_customize) {

    $wp_customize->add_section( 'et_divi_footer_credits' , array(
        'title'		=> esc_html__( 'Footer Credits', 'Divi' ),
        'panel' => 'et_divi_footer_panel',
    ) );

    $wp_customize->add_setting('et_divi[footer_credit_company]', array(
        'default' => 'Company Name',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('et_divi[footer_credit_company]', array(
        'label' => __('Enter Company Name', 'Divi'),
        'section' => 'et_divi_footer_credits',
        'type' => 'text',
    ));

    $wp_customize->add_setting('et_divi[footer_credit_url]', array(
        'default' => 'http://www.example.com/',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('et_divi[footer_credit_url]', array(
        'label' => __('Enter Company URL', 'Divi'),
        'section' => 'et_divi_footer_credits',
        'type' => 'text',
    ));
}
add_action('customize_register', 'jb_customize_register', 11);
