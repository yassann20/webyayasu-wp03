<section class="section-news hide">
    <div class="sections-title">
        <h2>news</h2>
    </div>
    <ul class="news-list">
        <?php
        // 最新の投稿を3件取得するためのクエリ引数
        $args = array(
            'post_type' => 'post', // 投稿タイプ
            'posts_per_page' => 3, // 取得する投稿数
            'orderby' => 'date', // 日付でソート
            'order' => 'DESC' // 新しいものから順
        );

        // クエリを作成
        $query = new WP_Query($args);

        // クエリが投稿を持っているか確認
        if ($query->have_posts()) :
            // 投稿がある場合、ループを開始
            while ($query->have_posts()) : $query->the_post();
                // 投稿日時の取得
                $date = get_the_date('Y-m-d');
                // 投稿のカテゴリーを取得（最初の1つだけ）
                $category = get_the_category();
                $category_name = !empty($category) ? $category[0]->name : '未設定';
        ?>
                <li class="news-list__item">
                    <a href="<?php the_permalink(); ?>">
                        <article>
                            <time datetime="<?php echo esc_attr($date); ?>"><?php echo esc_html(get_the_date()); ?></time>
                            <span class="category"><?php echo esc_html($category_name); ?></span>
                            <p><?php echo esc_html(get_the_title()); ?></p>
                        </article>
                    </a>
                </li>
        <?php
            endwhile;
            // 投稿データのリセット
            wp_reset_postdata();
        else :
            // 投稿がない場合のメッセージ
            echo '<li class="news-list__item"><p>ニュースはありません。</p></li>';
        endif;
        ?>
    </ul>
</section>