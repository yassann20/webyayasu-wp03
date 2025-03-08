<div class="page-tracking">
    <p>
        <?php
        if (is_front_page()) {
            echo 'home';
        } elseif (is_category()) {
            echo '<a href="' . home_url() . '">Home</a> >';
            single_cat_title();
        } elseif (is_single()) {
            echo '<a href="' . home_url() . '">Home</a> >';
            echo '<a href="' . get_permalink(get_option('page_for_posts')) . '">Blog</a> > ';
            the_title();
        }
        // 固定ページの場合
        elseif (is_page()) {
            echo '<a href="' . home_url() . '">Home</a> > ';
            the_title();
        }
        ?>
    </p>
</div>