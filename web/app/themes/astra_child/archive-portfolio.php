<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container archive-portfolio">
        <header class="page-header">
            <h1 class="page-title">Mes projets</h1>
        </header>
        
        <?php 
        // Create a new WP_Query instead of modifying the main query
        $portfolio_query = new WP_Query([
            'post_type' => 'portfolio',
            'posts_per_page' => 999, // Use a large number instead of -1
            'post_status' => 'publish'
        ]);
        
        if ($portfolio_query->have_posts()) : ?>
            <div class="portfolio-grid">
                <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
                        <a href="<?php the_permalink(); ?>" class="portfolio-link">
                            <div class="portfolio-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large'); ?>
                                <?php else : ?>
                                    <div class="no-thumbnail"></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="portfolio-info">
                                <h2 class="entry-title"><?php the_title(); ?></h2>
                                <?php if (function_exists('get_field') && get_field('client')) : ?>
                                    <div class="client">Client: <?php echo get_field('client'); ?></div>
                                <?php endif; ?>
                                
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                                if ($terms && !is_wp_error($terms)) : ?>
                                    <div class="portfolio-categories">
                                        <?php foreach ($terms as $term) : ?>
                                            <span class="category"><?php echo $term->name; ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p class="no-projects">Aucun projet n'a été trouvé.</p>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); // Reset post data ?>
    </div>
</main>

<?php get_footer(); ?>