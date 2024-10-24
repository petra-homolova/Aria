<?php 
// Enqueue styles and scripts
function aria_theme_enqueue_scripts() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2', 'all');

    // Enqueue Google Fonts: Fraunces
    wp_enqueue_style('fraunces-font', 'https://fonts.googleapis.com/css2?family=Fraunces:wght@100;400;700;900&display=swap');

    // Enqueue Google Fonts: Plaster
    wp_enqueue_style('plaster-font', 'https://fonts.googleapis.com/css2?family=Plaster&display=swap');
    // Enqueue Theme Styles
    wp_enqueue_style('aria-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'), 'all');

    // Enqueue jQuery (WordPress comes with jQuery by default)
    wp_enqueue_script('jquery');

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.5.2', true);
}
add_action('wp_enqueue_scripts', 'aria_theme_enqueue_scripts');

// Theme setup
function aria_theme_setup() {
    // Register menus
    register_nav_menus(array(
        'primary'   => __('Primary Menu', 'aria'),
        'secondary' => __('Secondary Menu', 'aria'),
    ));
}
add_action('after_setup_theme', 'aria_theme_setup');


function 
plp_register_strings() {
    pll_register_string("new-in", "NEW IN: THE ACT CAPSULE");
    pll_register_string("text-new-in", "This capsule is all about acting on your intentions and bringing your dreams to life. Characterised by handcrafted details and heavy yet simple styles, the Act capsule makes a noteworthy impression.");
    pll_register_string("reviews", "Customer Reviews");
    pll_register_string("read-more", "READ MORE");
    pll_register_string("buy-now", "BUY NOW");
    pll_register_string("no-reviews", "No reviews available at the moment.");
    pll_register_string("footer-contactus", "CONTACT US");
    pll_register_string("footer-questions", "Have questions or need support? Reach out to us:");
    pll_register_string("footer-aboutus", "ABOUT US");
    pll_register_string("footer-getinspired", "Get inspired and stay informed with the latest trends, tips, and stories from the world of jewelry.");
    pll_register_string("footer-visit", "Visit our blog");
    pll_register_string("footer-updates", "Get the latest updates and offers directly to your inbox");
    pll_register_string("footer-subcribenow", "Subscribe now");
    pll_register_string("bestsellers", "BESTSELLERS");
    pll_register_string("support-form", "SUPPORT FORM");

}

add_action("init", "plp_register_strings");


?>