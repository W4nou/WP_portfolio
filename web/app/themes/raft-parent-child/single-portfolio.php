<?php
get_header();
?>

<main id="primary" class="site-main">
    <div class="container single-portfolio">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <div class="project-details">
                    <?php if (function_exists('get_field')) : ?>
                        <div class="client">
                            <strong>Client:</strong> <?php echo get_field('client'); ?>
                        </div>
                        
                        <div class="date">
                            <strong>Date de réalisation:</strong> <?php echo get_field('date_de_realisation'); ?>
                        </div>
                        
                        <?php if (get_field('lien_du_projet')) : ?>
                            <div class="project-link">
                                <a href="<?php echo get_field('lien_du_projet'); ?>" target="_blank">Voir le projet</a>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (have_rows('galerie_dimages')) : ?>
                            <div class="project-gallery">
                                <h3>Galerie</h3>
                                <div class="gallery-images">
                                    <?php while (have_rows('galerie_dimages')) : the_row(); 
                                        $image = get_sub_field('image');
                                        if ($image) : ?>
                                            <div class="gallery-item">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                            </div>
                                        <?php endif;
                                    endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="portfolio-navigation">
                    <?php previous_post_link('%link', '&laquo; Projet précédent'); ?>
                    <?php next_post_link('%link', 'Projet suivant &raquo;'); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_template_part('template-parts/Footer'); ?>