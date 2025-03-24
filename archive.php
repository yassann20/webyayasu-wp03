<?php get_header(); ?>

<main>
    <div class="top-pading"></div><!--ヘッダーとの重なりを防ぐスペース-->
    <!-- ページtracking機能を付与 -->
    <?php get_template_part('template-parts/section', 'page-tracking') ?>
    <section class="archive">
        <!-- アーカイブページのタイトルを表示 -->
        <div class="sections-title">
            <?php if (is_category()): ?>
                <h2><?php echo single_cat_title('', false); //現在表示されているカテゴリー名を習得
                    ?>一覧</h2>
            <?php else: ?>
                <h2>記事一覧</h2>
            <?php endif; ?>
        </div>
        <div class="categorys">
            <p>
                <?php
                // すべてのカテゴリーを取得
                $categories = get_categories();

                // 各カテゴリーをループしてリストとして表示
                foreach ($categories as $category) {
                    echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                }
                ?>
            </p>
        </div>
        <!-- 記事の一覧を表示 -->
        <div class="archive-content">

            <?php
            // 投稿を取得するためのクエリを設定
            $args = array(
                'post_type' => array('post', 'section02'), // 投稿タイプを指定
                'posts_per_page' => -1, // すべての投稿を取得
            );

            // クエリを実行
            $query = new WP_query($args);

            // 投稿がある場合の処理
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
            ?>

                    <!-- 各投稿の情報を表示 -->
                    <article class="archive-content_item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <!-- アイキャッチ画像がある場合は表示 -->
                                    <?php the_post_thumbnail(); ?>
                                <?php else: ?>
                                    <!-- アイキャッチ画像がない場合の代替画像 -->
                                    <img src="<?php echo get_template_directory_uri(); ?>/site-date/photos/noimg.jpg" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="post">
                                <div class="post-meta">
                                    <!-- 投稿の日付を表示 -->
                                    <time datetime="<?php echo get_the_date('Y/m/d'); ?>"><?php echo get_the_date(); ?></time>
                                    <!-- 投稿の最初のカテゴリーを表示 -->
                                    <p class="category"><?php echo get_the_category()[0]->name; ?></p>
                                </div>
                                <div class="post-text">
                                    <!-- 投稿のタイトルを表示 -->
                                    <h3 class="title"><?php the_title(); ?></h3>
                                    <!-- 投稿の抜粋を表示（カスタム抜粋長を適用） -->
                                    <p><?php custom_excerpt_length(200); ?></p>
                                </div>
                            </div>
                        </a>
                    </article>

            <?php
                endwhile;
            else:
                // 投稿がない場合のメッセージ
                echo __('投稿が見つかりませんでした。');
            endif;
            ?>


        </div>
    </section>

</main>

<?php get_footer(); ?>