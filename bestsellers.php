<?php
/**
 * Template Name: Bestsellers
 */

get_header(); // Includes the header.php file
?>

<div class="container-fluid bestseller-hero">
    <div class="row">
        <div class="col-md-12 justify-content-center">
            <h1 class="h1 py-5">BESTSELLERS</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        // Query to fetch products or posts for bestsellers
        $args = array(
            'post_type' => 'product', // Assuming you're using a custom post type 'product'
            'posts_per_page' => 9, // Number of products to display
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <!-- Card -->
                <div class="col-md-4 my-5">
                    <div class="cards" style="width: 100%; height: 100%;">
                        <?php 
                        // Načítanie obrázkov pomocou ACF
                        $item_one = get_field('item_one'); // Názov poľa ACF pre obrázok
                        $short_description = get_field('short_description');
                        
                        // Kontrola, či je nastavený obrázok v ACF
                        if ($item_one && isset($item_one['url'])) : ?>
                            <div class="image-container" style="width: 100%; height: 350px; overflow: hidden;">
                                <img src="<?php echo esc_url($item_one['url']); ?>" class="card-img-top p-5" alt="<?php echo esc_attr($item_one['alt']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        <?php else : ?>
                            <div class="image-container" style="width: 100%; height: 350px; background-color: #f5f5f5;">
                                <!-- Placeholder content or empty div to maintain space -->
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <?php
                            // Kontrola, či pole obsahuje nejaký obsah
                            if ($short_description) {
                                // Zobrazenie obsahu textového poľa
                                echo '<div class="short_description">';
                                echo esc_html($short_description); // Bezpečné zobrazenie textového obsahu
                                echo '</div>';
                            } else {
                                // Ak pole neobsahuje obsah, môžeš zobraziť prázdny alebo alternatívny text
                                echo '<div class="short_description">';
                                echo '<p>No short description available.</p>';
                                echo '</div>';
                            }
                            ?>
                            <div class="d-flex align-items-center text-center justify-content-between pt-3">
                                <p class="card-text text-center m-0"><?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?> DKK</p>
                                <a href="<?php the_permalink(); ?>" class="btn m-0">BUY NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php _e('Sorry, no products found.'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer(); // Includes the footer.php file
?>
