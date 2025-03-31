<?php get_header(); ?>

<div class="container archive-portfolio">
    <div class="row">
        <div class="col-md-12">
            <header class="page-header">
                <h1 class="page-title">Portfolio</h1>
            </header>
        </div>
    </div>

    <?php if (have_posts()) : ?>
        <div class="row portfolio-grid">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <a href="<?php the_permalink(); ?>" class="portfolio-link">
                            <div class="portfolio-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
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
                </div>
            <?php endwhile; ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col-md-12">
                <p>Aucun projet n'a été trouvé.</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>