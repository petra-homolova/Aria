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
                $image_one = get_field('image_one'); // Obrázok 1
                $image_two = get_field('image_two'); // Obrázok 2
                $image_three = get_field('image_three'); // Obrázok 3
                $image_four = get_field('image_four'); // Obrázok 4
                $image_five = get_field('image_five'); // Obrázok 5

                // Vykreslenie obrázkov
                if ($image_one && isset($image_one['url'])) : ?>
                    <div class="col-md-2">
                        <img src="<?php echo esc_url($image_one['url']); ?>" class="img-fluid custom-img" alt="<?php echo esc_attr($image_one['alt']); ?>" style="margin-top: 190px;">
                    </div>
                <?php endif; ?>

                <?php if ($image_two && isset($image_two['url'])) : ?>
                    <div class="col-md-2">
                        <img src="<?php echo esc_url($image_two['url']); ?>" class="img-fluid custom-img" alt="<?php echo esc_attr($image_two['alt']); ?>" style="margin-top: 80px;">
                    </div>
                <?php endif; ?>

                <?php if ($image_three && isset($image_three['url'])) : ?>
                    <div class="col-md-2">
                        <img src="<?php echo esc_url($image_three['url']); ?>" class="img-fluid custom-img" alt="<?php echo esc_attr($image_three['alt']); ?>" style="margin-top: 270px;">
                    </div>
                <?php endif; ?>

                <?php if ($image_four && isset($image_four['url'])) : ?>
                    <div class="col-md-2">
                        <img src="<?php echo esc_url($image_four['url']); ?>" class="img-fluid custom-img" alt="<?php echo esc_attr($image_four['alt']); ?>" style="margin-top: 120px;">
                    </div>
                <?php endif; ?>

                <?php if ($image_five && isset($image_five['url'])) : ?>
                    <div class="col-md-2">
                        <img src="<?php echo esc_url($image_five['url']); ?>" class="img-fluid custom-img" alt="<?php echo esc_attr($image_five['alt']); ?>" style="margin-top: 210px;">
                    </div>
                <?php endif; ?>

            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php _e('Sorry, no content found.'); ?></p>
        <?php endif; ?>
    </div>
</div>

<div class="container-fluid hero-text">
    <div class="row justify-content-center">
        <div class="col-8">
            <h4>NEW IN: THE ACT CAPSULE</h4>
            <p>This capsule is all about acting on your intentions and bringing your dreams to life. Characterised by handcrafted details and heavy yet simple styles, the Act capsule makes a noteworthy impression.</p>
        </div>
    </div>
</div>

<!-- Zvyšok tvojho kódu ostáva nezmenený -->

<div class="container">
    <!-- Card -->
    <div class="col-md-4 my-5">
                    <div class="cards" style="width: 100%;">
                        <?php 
                        // Načítanie obrázkov pomocou ACF
                        $item_one = get_field('item_one'); // Názov poľa ACF pre obrázok
                        $short_description =get_field('short_description');
                        
                        // Kontrola, či je nastavený obrázok v ACF
                        if ($item_one && isset($item_one['url'])) : ?>
                            <img src="<?php echo esc_url($item_one['url']); ?>" class="card-img-top p-5" alt="<?php echo esc_attr($item_one['alt']); ?>">

                           
                        <?php else : ?>
                            
                            
                            
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
    <!-- Your card components -->

</div>

<div class="customer-reviews">
    <!-- Customer Reviews Section -->
</div>

<div class="container-fluid fotky">
    <!-- Any other content -->
</div>

<?php get_footer(); // Include the footer.php file ?>
<?php wp_footer(); ?>
</body>

</html>
