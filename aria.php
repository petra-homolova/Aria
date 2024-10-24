<?php
/**
 * Template Name: Aria
 */
get_header(); // Include the header.php file
?>

<div class="container-fluid homepage-hero">
    <div class="row justify-content-center">
        <?php
        // Nastavenie dotazu na príspevky pre typ príspevku 'Aria homepage'
        $args = array(
            'post_type' => 'aria-homepage', // Typ príspevku, ktorý chceš zobraziť
            'posts_per_page' => 1, // Predpokladáme, že bude iba jeden príspevok na stránku
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                // Načítanie polí z ACF
                $images = array(
                    get_field('image_one'),
                    get_field('image_two'),
                    get_field('image_three'),
                    get_field('image_four'),
                    get_field('image_five')
                );

                // Prechádzanie obrázkami a ich zobrazenie
                foreach ($images as $index => $image) :
                    if ($image && isset($image['url'])) : 
                        // Vypočítanie štýlu margin-top na základe indexu
                        $margin_top = ($index % 2 == 0) ? 190 + ($index * 30) : 80 + ($index * 40);
                        ?>
                        <div class="col-6 col-md-4 col-lg-2 mb-4"> <!-- Responsive column classes -->
                            <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid custom-img" alt="<?php echo esc_attr($image['alt']); ?>" style="margin-top: <?php echo $margin_top; ?>px;">
                        </div>
                    <?php 
                    endif;
                endforeach;
            endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php _e('Sorry, no content found.'); ?></p>
        <?php endif; ?>
    </div>
</div>


<div class="container-fluid hero-text">
    <div class="row justify-content-center">
        <div class="col-8">
            <?php
            // Query for the latest 'home-page-text' post
            $args = array(
                'post_type' => 'home-page-text',
                'posts_per_page' => 1, 
            );
            $new_in_query = new WP_Query($args);

            if ($new_in_query->have_posts()) :
                while ($new_in_query->have_posts()) : $new_in_query->the_post(); 
                    // Use get_field() to retrieve custom fields
                    $new_in_title = get_field('new_in_title');
                    $new_in_text = get_field('new_in_text');
            ?>
                    <h4><?php echo esc_html($new_in_title); ?></h4>
                    <p><?php echo esc_html($new_in_text); ?></p>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <h4><?php pll_e("NEW IN: THE ACT CAPSULE") ?></h4>
                <p><?php pll_e("This capsule is all about acting on your intentions and bringing your dreams to life. Characterised by handcrafted details and heavy yet simple styles, the Act capsule makes a noteworthy impression."); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>




<!-- Zvyšok tvojho kódu ostáva nezmenený -->
<div class="container-fluid">
    <div class="row row-cards my-5">
        <?php
        // Query to fetch products or posts for bestsellers
        $args = array(
            'post_type' => 'home-page-product', // Correct the post type slug
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <!-- Card -->
                <div class="col-md-4 my-5 d-flex">
                    <div class="cards" style="width: 100%; height: 100%;">
                        <?php 
                        // Load images using ACF
                        $item_one = get_field('item_one'); // Ensure the field name matches exactly in ACF
                        $short_description = get_field('short_description');
                        
                        // Check if ACF image field is set
                        if ($item_one && isset($item_one['url'])) : ?>
                            <div class="image-container" style="width: 100%; height: 350px; overflow: hidden;">
                                <img src="<?php echo esc_url($item_one['url']); ?>" class="card-img-top" alt="<?php echo esc_attr($item_one['alt']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
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
                            // Check if ACF text field has content
                            if ($short_description) {
                                echo '<div class="short_description">';
                                echo esc_html($short_description); // Display text content
                                echo '</div>';
                            } else {
                                echo '<div class="short_description">';
                                echo '<p>No short description available.</p>';
                                echo '</div>';
                            }
                            ?>
                            <div class="d-flex align-items-center justify-content-between pt-3">
                                <p class="card-text m-0"><?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?> DKK</p>
                                <a  class="btn m-0"><?php pll_e("BUY NOW") ?></a>
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



<div class="customer-reviews">
    <h2><?php pll_e("Customer Reviews") ?></h2>
    <div class="container reviews-container">
        <?php
        // Fetch all posts from the custom post type 'customer_reviews' (or wherever you've linked ACF)
        $args = array(
            'post_type' => 'customer-reviews', // Update with the correct post type slug
            'posts_per_page' => -1 // Fetch all reviews
        );
        $reviews_query = new WP_Query($args);

        if ($reviews_query->have_posts()) :
            while ($reviews_query->have_posts()) : $reviews_query->the_post();
                // Fetch ACF fields
                $customer_name = get_field('customer_name');
                $review_content = get_field('review_content');
                $rating = get_field('rating');
                $customer_photo = get_field('customer_photo'); // Optional photo
        ?>
                <div class="review">
                    <div class="review-header pb-3">
                        <?php if ($customer_photo) : ?>
                            <img src="<?php echo esc_url($customer_photo['url']); ?>" alt="<?php echo esc_attr($customer_name); ?>" class="customer-photo" />
                        <?php endif; ?>
                        <p class="review-author"><?php echo esc_html($customer_name); ?></p>
                    </div>
                    <p><?php echo esc_html($review_content); ?></p>
                    <div class="stars">
                        <?php
                        // Display stars based on rating
                        for ($i = 0; $i < intval($rating); $i++) {
                            echo '<span class="star">&#9733;</span>'; // Filled star
                        }
                        // Add empty stars if the rating is less than 5
                        for ($i = intval($rating); $i < 5; $i++) {
                            echo '<span class="star">&#9734;</span>'; // Empty star
                        }
                        ?>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p><?php pll_e("No reviews available at the moment.") ?></p>
        <?php endif; ?>
    </div>
</div>



<div class="container-fluid fotky">
    <div class="row">
        <?php
        // Custom query to fetch posts from the 'image_gallery' custom post type
        $args = array(
            'post_type' => 'image_gallery', // Custom post type slug
            'posts_per_page' => -1, // Get all posts (you can set a limit by changing this number)
        );
        $gallery_query = new WP_Query($args); // Run the query

        if ($gallery_query->have_posts()):
            while ($gallery_query->have_posts()): $gallery_query->the_post();

                // Get the ACF image field for the current post
                $image = get_field('image_gallery'); // Assuming 'image' is the ACF field name for the image

                // Check if the image field exists
                if ($image): 
                    ?>
                    <div class="col-md-2 p-0">
                        <a href="<?php echo esc_url($image['url']); ?>" target="_blank">
                            <img src="<?php echo esc_url($image['sizes']['medium']); ?>" class="img-fluid object-cover" style="width: 550px; height: 430px;" alt="<?php echo esc_attr($image['alt']); ?>">
                        </a>
                    </div>
                    <?php
                else:
                    echo '<p>No image available for this post.</p>';
                endif;

            endwhile;
            wp_reset_postdata(); // Reset the main query after our custom query
        else:
            echo '<p>No gallery posts available.</p>'; // Message when no posts are found
        endif;
        ?>
    </div>
</div>




<?php get_footer(); // Include the footer.php file ?>
<?php wp_footer(); ?>
</body>

</html>
