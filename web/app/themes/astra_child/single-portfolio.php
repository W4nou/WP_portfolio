<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container single-portfolio">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="portfolio-content-wrapper">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php if (function_exists('get_field')) : ?>
                    <div class="project-details">
                        <h2 class="project-details-title">Détails du projet</h2>
                        
                        <div class="details-grid">
                            <?php if (get_field('client')) : ?>
                                <div class="detail-item client">
                                    <span class="detail-label">Client</span>
                                    <span class="detail-value"><?php echo get_field('client'); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (get_field('date_de_realisation')) : ?>
                                <div class="detail-item date">
                                    <span class="detail-label">Date de réalisation</span>
                                    <span class="detail-value"><?php echo get_field('date_de_realisation'); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if (get_field('lien_du_projet')) : ?>
                                <div class="detail-item project-link">
                                    <a href="<?php echo get_field('lien_du_projet'); ?>" target="_blank" class="btn-project">
                                        <span>Voir le projet</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php $gallery_images = get_field('galerie');
                    if ($gallery_images && is_array($gallery_images) && !empty($gallery_images)) : ?>
                        <div class="project-gallery">
                            <h2 class="gallery-title">Galerie du projet</h2>
                            <div class="gallery-grid">
                                <?php foreach ($gallery_images as $image_url) : ?>
                                    <div class="gallery-item">
                                        <a href="<?php echo esc_url($image_url); ?>" class="lightbox">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                <div class="portfolio-navigation">
                    <div class="nav-links">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '<span class="nav-arrow">&laquo;</span> <span class="nav-label">Projet précédent</span>'); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link('%link', '<span class="nav-label">Projet suivant</span> <span class="nav-arrow">&raquo;</span>'); ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>