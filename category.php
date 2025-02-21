<?php get_header(); ?>

<main>

    <section class="archive">
        <!-- カテゴリー一覧の表示 -->
        <div class="categorys">
            <ul>
                <?php
                // すべてのカテゴリーを取得
                $categories = get_categories();

                // 各カテゴリーをループしてリストアイテムとして表示
                foreach ($categories as $category) {
                    echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                }
                ?>
            </ul>
        </div>

        <!-- アーカイブページのタイトル表示 -->
        <div class="archive-text">
            <h2><?php echo single_cat_title('', false); //現在表示されているカテゴリー名を習得
                ?>一覧</h2>
        </div>

        <!-- 投稿一覧を表示 -->
        <div class="archive-content">

            <?php
            // 投稿を取得するためのクエリ設定
            $args = array(
                'post_type' => 'post', // 投稿タイプを指定
                'posts_per_page' => -1, // すべての投稿を取得
            );

            // クエリを実行
            $query = new WP_query($args);

            // 投稿が存在する場合の処理
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
            ?>

                    <!-- 各投稿の情報を表示 -->
                    <article class="archive-content_item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <!-- アイキャッチ画像が設定されている場合に表示 -->
                                    <?php the_post_thumbnail(); ?>
                                <?php else: ?>
                                    <!-- アイキャッチ画像が設定されていない場合の代替画像 -->
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
                                    <!-- 投稿タイトルを表示 -->
                                    <h3 class="title"><?php the_title(); ?></h3>
                                    <!-- 投稿の抜粋を表示（カスタム抜粋長を適用） -->
                                    <p><?php custom_excerpt_length(50); ?></p>
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

        <!-- ページネーションを表示 -->
        <div class="pagination">
            <ul>
                <!-- 前のページへのリンク -->
                <li><a id="prev" href="">← prev</a></li>
                <!-- 次のページへのリンク -->
                <li><a id="next" href="">next →</a></li>
            </ul>
        </div>

    </section>

</main>

<?php get_footer(); ?>