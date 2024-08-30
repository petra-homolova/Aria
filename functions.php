<?php 
function aria_load_resources() {
    wp_enqueue_style("bootstrap-css", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css");
    wp_enqueue_style("theme-style", get_template_directory_uri() . "/style.css");
}
add_action("wp_enqueue_scripts" , "faq_load_resources");