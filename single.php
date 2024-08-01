<?php get_header(); ?>

<main>

    <?php
// WordPress のループ開始
if (have_posts()) :
    while (have_posts()) :
        the_post();
?>

    <section class="blog-page">
        <div class="img thumbnail">
            <img class="img_item" src="../photos/sitecodding.jpg" alt="">
        </div>
        <div class="blog-header">
            <p class="time-data"><?php echo __('更新日'); ?><time
                    datetime="<?php echo get_the_date('Y/m/d'); ?>"><?php echo get_the_date(); ?></time></p>
            <p class="category-name">
                <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        foreach ( $categories as $category ) {
                             echo esc_html( $category->name );//カテゴリー名を出力
                        }
                    } else {
                        echo 'カテゴリがありません';
                    }
                ?>
            </p>
        </div>
        <div class="blog-content">
            <?php the_content(); ?>
        </div>
        <div class="pagination">
            <ul>
                <li><a id="prev" href="">← prev</a></li>
                <li><a id="next" href="">next →</a></li>
            </ul>
        </div>
    </section>

    <?php
    endwhile;
else :
    // 投稿がない場合の処理
    echo __('投稿が見つかりませんでした。');
endif;
// WordPress のループ終了
?>

</main>

<?php get_footer(); ?>