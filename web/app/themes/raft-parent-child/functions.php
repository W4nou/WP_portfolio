<?php
function raft_child_enqueue_styles() {
    wp_enqueue_style('raft', get_template_directory_uri() . '/style.css');
    
    // Style du thème enfant
    wp_enqueue_style('raft-parent-child', 
        get_stylesheet_directory_uri() . '/style.css',
        ['raft-parent'],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'raft_child_enqueue_styles');

function raft_child_theme_setup() {
    load_child_theme_textdomain('raft', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'raft_child_theme_setup');

require_once get_stylesheet_directory() . '/cpt-portfolio.php';

add_action('init', 'create_portfolio_cpt');