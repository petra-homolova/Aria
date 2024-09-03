<div class="post-meta">
    <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
    <span class="post-author"><?php echo esc_html(get_the_author()); ?></span>
    <div class="post-categories">
        <?php
        // Zobraziť kategórie s odkazmi
        $categories = get_the_category();
        if ($categories) :
            echo '<span>Categories: </span>';
            foreach ($categories as $category) :
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a> ';
            endforeach;
        endif;
        ?>
    </div>
    <div class="post-tags">
        <?php
        // Zobraziť štítky s odkazmi
        $tags = get_the_tags();
        if ($tags) :
            echo '<span>Tags: </span>';
            foreach ($tags as $tag) :
                echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a> ';
            endforeach;
        endif;
        ?>
    </div>
</div>
