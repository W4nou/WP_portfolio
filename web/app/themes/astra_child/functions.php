<?php
function astra_child_enqueue_styles() {
    wp_enqueue_style('astra-theme-css', 
        get_template_directory_uri() . '/style.css', 
        [], 
        wp_get_theme()->parent()->get('Version')
    );
    wp_enqueue_style('astra-child', 
        get_stylesheet_directory_uri() . '/style.css',
        ['astra-theme-css'], 
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('portfolio-styles', 
        get_stylesheet_directory_uri() . '/portfolio-styles.css',
        ['astra-child'], 
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'astra_child_enqueue_styles');

function astra_child_theme_setup() {
    load_child_theme_textdomain('astra', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'astra_child_theme_setup');

require_once get_stylesheet_directory() . '/cpt-portfolio.php';
add_action('init', 'create_portfolio_cpt');