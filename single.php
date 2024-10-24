
<?php
/**
 * Template Name: Bestsellers
 */

get_header(); // Includes the header.php file
?>



<div class="jewelry-trends mt-5 container container-fluid text-justify">
    <div class="trends-container">
        <?php
        // Fetch all posts from the custom post type 'blog-single-page'
        $args = array(
            'post_type' => 'blog-single-page', // Post type slug
            'posts_per_page' => -1 // Fetch all trends
        );
        $trends_query = new WP_Query($args);

        if ($trends_query->have_posts()) :
            while ($trends_query->have_posts()) : $trends_query->the_post();
                // Fetch ACF fields
                $main_title = get_field('main_title');
                $main_content = get_field('main_content');
                $sections = get_field('sections'); // Array of sections
        ?>
                <div class="trend mb-5">
                    <div class="d-flex justify-content-center">
                        <h3 class="py-3 trend-title"><?php echo esc_html($main_title); ?></h3>
                    </div>
                    <div class="trend-content mb-4">
                        <p><?php echo wp_kses_post($main_content); ?></p>
                    </div>
                    <?php if ($sections): ?>
                        <?php foreach ($sections as $section): 
                            $section_title = $section['section_title'];
                            $section_content = $section['section_content'];
                            $section_image = $section['section_image'];
                        ?>
                            <div class="row align-items-center mb-4">
                                <!-- Column with image -->
                                <div class="col-md-6">
                                    <?php if ($section_image): ?>
                                        <img src="<?php echo esc_url($section_image['url']); ?>" alt="<?php echo esc_attr($section_title); ?>" class="img-fluid mt-3 section-image" />
                                    <?php endif; ?>
                                </div>
                                <!-- Column with text -->
                                <div class="col-md-6">
                                    <h6 class="section-title"><?php echo esc_html($section_title); ?></h6>
                                    <div class="section-content">
                                        <p><?php echo wp_kses_post($section_content); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p class="text-center"><?php pll_e("No jewelry trends available at the moment.") ?></p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); // Include the footer.php file ?>
<?php wp_footer(); ?>