<?php
/*
Template Name: Homepage
*/
get_header();
?>
<div class="container">
    <div class="content">
        <?php 
        // Get the main content first
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        
        // Get selected portfolio projects
        $selected_projects = get_field('projets_mis_en_avant');
        
        if (!empty($selected_projects)) {
            echo '<div class="portfolio-grid">';
            
            foreach ($selected_projects as $project_id) {
                $project = get_post($project_id);
                
                if ($project) {
                    echo '<div class="portfolio-item">';
                    // Display featured image if available
                    if (has_post_thumbnail($project_id)) {
                        echo get_the_post_thumbnail($project_id, 'medium');
                    }
                    
                    echo '<h3>' . get_the_title($project_id) . '</h3>';
                    echo '<div class="excerpt">' . get_the_excerpt($project_id) . '</div>';
                    echo '<a href="' . get_permalink($project_id) . '">Read more</a>';
                    echo '</div>';
                }
            }
            
            echo '</div>';
        }
        ?>
    </div>
</div>
<?php get_footer(); ?>