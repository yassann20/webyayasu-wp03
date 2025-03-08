<?php get_header(); ?>

<main>
    <!-- ページtracking機能を付与 -->
    <?php get_template_part('template-parts/section', 'page-tracking') ?>

    <?php
    // WordPress のループ開始
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>

            <section class="blog-page">
                <div class="blog-header">
                    <p class="time-data"><?php echo __('更新日'); ?><time
                            datetime="<?php echo get_the_date('Y/m/d'); ?>"><?php echo get_the_date(); ?></time></p>
                    <p class="category-name">
                        <?php
                        // 記事のカテゴリーを取得
                        $categories = get_the_category();

                        // カテゴリーが存在する場合
                        if (! empty($categories)) {
                            // 最初のカテゴリーを取得
                            $category = $categories[0];

                            // カテゴリーのリンクを表示
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                        }
                        ?>
                    </p>
                </div>
                <h1><?php echo the_title(); ?></h1>

                <?php if (has_post_thumbnail()): ?>
                    <div class="img thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>

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