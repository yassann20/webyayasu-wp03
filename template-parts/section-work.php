<section id="work" class="section-work">
    <div class="sections-text-scale">
        <div class="sections-title">

            <h2>work</h2>
        </div>
        <p class="section-text">当方ではデザインからコーディング、立ち上げ後の保守などを請け負っています。ウェブサイトに関わる案件であれば柔軟に対応可能ですので、お気軽にご相談ください。
        </p>
    </div>
    <div class="work-content">
        <!--section01(work)のコンテンツを出力-->
        <?php
        // カスタム投稿タイプ「section01」のクエリ
        $args = array(
            'post_type'      => 'section01',
            'posts_per_page' => 10, // 表示する投稿数
            'orderby' => 'menu_order',  // プラグインの並び順を使用
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
                <div class="work-content_item hide">
                    <div class="img">
                        <!--サムネイル画像を出力-->
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                    </div>
                    <?php
                    // CFSで追加したカスタムフィールドの値を取得して表示
                    $work_content_h3 = CFS()->get('work_content_h3'); // 'work_content_h3' はフィールドの名前
                    if ($work_content_h3) {
                        echo '<h3>' . esc_html($work_content_h3) . '</h3>';
                    }

                    $work_content_text = CFS()->get('work_content_text'); // 'work_content_h3' はフィールドの名前
                    if ($work_content_text) {
                        echo '<p>' . esc_html($work_content_text) . '</p>';
                    }
                    ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>