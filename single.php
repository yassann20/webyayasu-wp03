<?php get_header(); ?>

<main>
    <div class="top-pading"></div><!--ヘッダーとの重なりを防ぐスペース-->
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
                        <!--通常の投稿記事とカスタム投稿記事が混ざった記事リンクを取得する処理-->
                        <?php
                        //現在の投稿IDと投稿タイプを取得
                        $current_id = get_the_ID();
                        $current_type = get_post_type();

                        //投稿とカスタム投稿(section02)を指定
                        $post_types = array('post', 'section02');

                        // 現在の投稿より古い記事を取得（前の記事）
                        $prev_post = get_posts(array(
                            'post_type'      => $post_types,
                            'posts_per_page' => 1,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'post_status'    => 'publish',
                            'exclude'        => $current_id, // 現在の投稿を除外
                            'date_query'     => array(
                                array(
                                    'before' => get_the_date('Y-m-d H:i:s', $current_id) // 現在の投稿より前
                                )
                            )
                        ));

                        // 現在の投稿より新しい記事を取得（次の記事）
                        $next_post = get_posts(array(
                            'post_type'      => $post_types,
                            'posts_per_page' => 1,
                            'orderby'        => 'date',
                            'order'          => 'ASC',
                            'post_status'    => 'publish',
                            'exclude'        => $current_id, // 現在の投稿を除外
                            'date_query'     => array(
                                array(
                                    'after' => get_the_date('Y-m-d H:i:s', $current_id) // 現在の投稿より後
                                )
                            )
                        ));
                        ?>
                        <!--カスタム投稿(section02)のリンクを取得する場合-->
                        <!--前の記事を取得-->
                            <li>
                                <?php
                                if (!empty($prev_post)):
                                ?>
                                    <a id="prev" href="<?php echo get_permalink($prev_post[0]->ID); ?>">← prev</a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <?php
                                if (!empty($next_post)):
                                ?>
                                    <a id="next" href="<?php echo get_permalink($next_post[0]->ID); ?>">next →</a>
                                <?php endif; ?>
                            </li>
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