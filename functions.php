<?php 
// Enqueue styles and scripts
function aria_theme_enqueue_scripts() {
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,100..900;1,9..144,100..900&display=swap');
    wp_enqueue_style('aria-style', get_stylesheet_uri());
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'aria_theme_enqueue_scripts');

// Theme setup
function aria_theme_setup() {
    register_nav_menus(array(
        'primary'   => __('Primary Menu', 'aria'),
        'secondary' => __('Secondary Menu', 'aria'),
    ));
}
add_action('after_setup_theme', 'aria_theme_setup');
?>
