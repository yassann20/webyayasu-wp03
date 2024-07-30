<section class="section-portfolio">
    <div class="sections-text-scale">
        <div class="sections-title">
            <h2>portfolio</h2>
        </div>
        <p class="section-text">
            これまでに制作してきたウェブサイトの数々をご紹介いたします。それぞれのデザインや運用目的は異なりますが、基礎的なSEO対策や表示速度の高速化等、それぞれの用途に合わせて最適化、またソースコードの再利用性など細かなところも考慮しながら制作いたします。
        </p>
    </div>
    <div class="portofolio-content">
        <!--section02(portfolio)のコンテンツを出力-->
        <?php
        // カスタム投稿タイプ「section02」のクエリ
        $args = array(
            'post_type'      => 'section02',
            'posts_per_page' => 10, // 表示する投稿数
            'order'          => 'DESC', // 降順
            'orderby'        => 'date' // 投稿日で並べる
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                ?>
        <div class="portofolio-content__item left hide">
            <div class="portofolio-img-slider">
                <div class="img">
                    <!--サムネイル画像を出力-->
                    <?php if(has_post_thumbnail() ): ?>
                    <?php the_post_thumbnail(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>