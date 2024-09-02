<?php
/**
 * Template Name: Blog
 */
get_header(); // Include the header.php file
?>

       

   <!-- Blogs -->
   <div class="container">
        <div class="row">
            <?php
            // Nastavenie dotazu na príspevky
            $args = array(
                'post_type' => 'blog-item', // Typ príspevku, ktorý chceš zobraziť (blog-items)
                'posts_per_page' => 6, // Počet príspevkov na stránku
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    // Načítanie polí z ACF
                    $title = get_field('title'); // Názov poľa ACF pre názov
                    $color = get_field('color'); // Názov poľa ACF pre farbu
                    $description = get_field('description'); // Názov poľa ACF pre popis
                    $blog_image = get_field('blog_image'); // Názov poľa ACF pre obrázok
                    ?>
                    <div class="col-md-4 my-5 d-flex align-items-stretch">
                        <div class="cards" style="width: 100%;">
                            <?php if ($blog_image && isset($blog_image['url'])) : ?>
                                <img src="<?php echo esc_url($blog_image['url']); ?>" class="card-img-top" alt="<?php echo esc_attr($blog_image['alt']); ?>">
                            <?php else : ?>
                                <img src="path/to/default-image.jpg" class="card-img-top" alt="Default Image">
                            <?php endif; ?>
                            <div class="card-body";>
                                <h5 class="card-title"><?php echo esc_html($title); ?></h5>
                                <p class="card-text"><?php echo esc_html($description); ?></p>
                                <div class="d-flex align-items-center text-center justify-content-between pt-3">
                                    <a href="<?php the_permalink(); ?>" class="btn m-0">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php _e('Sorry, no posts found.'); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <?php get_footer(); // Include the footer.php file ?>
</body>
</html>
