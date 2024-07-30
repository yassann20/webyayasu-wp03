<section class="section-skill">
    <div class="sections-text-scale">
        <div class="sections-title">
            <h2>skill</h2>
        </div>
        <p class="section-text">扱えるソフト、プログラミング言語を習得レベルと一緒に可視化してみました。なお日々新しい知識の習得に専念していますので実務での使用が可能になり次第更新いたします。</p>
    </div>
    <div class="skill-content">
        <!--section03(skill)のコンテンツを出力-->
        <?php
        // カスタム投稿タイプ「section03」のクエリ
        $args = array(
            'post_type'      => 'section03',
            'posts_per_page' => 10, // 表示する投稿数
            'order'          => 'DESC', // 降順
            'orderby'        => 'date' // 投稿日で並べる
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                ?>
        <div class="skill-content__item hide skill-left">
            <div class="img">
                <!--サムネイル画像を出力-->
                <?php if(has_post_thumbnail() ): ?>
                <?php the_post_thumbnail(); ?>
                <?php endif; ?>
            </div>
            <div class="skill-content__item__text">
                <?php the_content(); ?>
            </div>
            <div class="skill-content__item__button">
                <span></span>
                <span></span>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>