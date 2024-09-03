<?php
get_header(); 

<div class="container mt-5">
    <?php
    if (have_posts()) : 
        while (have_posts()) : the_post();
    ?>
        <div class="post">
            <h1 class="post-title text-center"><?php the_title(); ?></h1>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail text-center mb-4">
                    <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                </div>
            <?php endif; ?>

            <div class="post-meta text-center mb-4">
                <span class="post-date"><?php echo get_the_date(); ?></span> | 
                <span class="post-category"><?php the_category(', '); ?></span>
            </div>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <div class="post-navigation d-flex justify-content-between mt-5">
                <div class="previous-post">
                    <?php previous_post_link('%link', '« %title'); ?>
                </div>
                <div class="next-post">
                    <?php next_post_link('%link', '%title »'); ?>
                </div>
            </div>
        </div>

        <?php
        endwhile;
    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
</div>

<?php
get_footer(); 
?>
