<?php
/**
 * Template Name: Contact
 */
get_header(); // Include the header.php file
?>

<div class="container-fluid-contact text-center">
    <div class="container mb-5">
        <h1>CONTACT US</h1>   
    </div>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <?php
        if (function_exists('the_field')) {
            the_field('your_custom_field'); 
        }
        ?>

        <div class="contact-form-wrapper">
            <h4>CONTACT FORM</h4>
            <div class="contact-form">
                <?php
                echo do_shortcode('[contact-form-7 id="27c0f65" title="Contact form Aria"]');
                ?>
            </div>
        </div>
    </div>


<?php get_footer(); // Include the footer.php file ?>
