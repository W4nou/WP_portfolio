<?php
function create_portfolio_cpt() {
    register_post_type('portfolio', [
        'public' => true,
        'label' => 'Portfolio',
        'supports' => ['title', 'editor', 'thumbnail', 'date'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'portfolio'],
        'taxonomies' => ['portfolio_category']
    ]);

    register_taxonomy('portfolio_category', 'portfolio', [
        'public' => true,
        'label' => 'Catégories Portfolio'
    ]);
}