<div class="page-tracking">
    <p>
        <?php
        // カテゴリー・アーカイブページ
        if (is_category() || is_archive()) {
            echo '<a href="' . home_url() . '">Home</a> >';
            echo single_cat_title();
        // 投稿ページ
        } elseif (is_single()) {
            echo '<a href="' . home_url() . '">Home</a> >';
            echo '<a href="' . get_permalink(get_option('page_for_posts')) . '">Blog</a> > ';
            the_title();
        }
        // 固定ページの場合
        elseif (is_page()) {
            echo '<a href="' . home_url() . '">Home</a> > ';
            echo the_title();
        }
        ?>
    </p>
</div>