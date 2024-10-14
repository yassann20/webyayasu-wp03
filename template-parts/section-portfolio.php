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
            'orderby' => 'menu_order',  // プラグインの並び順を使用
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
            // 記事のインデックス番号を取得（1から始まる）
        $index = $query->current_post+1;
                ?>
        <div class="portofolio-content__item <?php echo ($index % 2 == 0) ? "right" : "left"; ?> hide">
            <div class="portofolio-img-slider">
                <!--portofolio-img-pc-->
                <div class="portofolio-img-pc">
                    <p class="scroll">scroll</p>
                    <?php $portofolio_pc_img = CFS()->get('portofolio_pc_img'); ?>
                    <img class="portofolio-img-outer"
                        src="<?php if ($portofolio_pc_img) { echo esc_url($portofolio_pc_img); } ?>" alt="">
                    <div class="portofolio-img-content-outer">
                        <?php $portofolio_pc_img_inner = CFS()->get('portofolio_pc_img_inner'); ?>
                        <img class="portofolio-img_inner"
                            src="<?php if ($portofolio_pc_img_inner) { echo esc_url($portofolio_pc_img_inner); } ?>" alt="">
                    </div>
                </div>
                <!--portofolio-img-sp-->
                <div class="portofolio-img-sp">
                <p class="scroll">scroll</p>
                    <?php $portofolio_sp_img = CFS()->get('portofolio_sp_img'); ?>
                    <img class="portofolio-img-outer"
                        src="<?php if ($portofolio_sp_img) { echo esc_url($portofolio_sp_img); } ?>" alt="">
                    <div class="portofolio-img-content-outer">
                        <?php $portofolio_sp_img_inner = CFS()->get('portofolio_sp_img_inner'); ?>
                        <img class="portofolio-img_inner"
                            src="<?php if ($portofolio_sp_img_inner) { echo esc_url($portofolio_sp_img_inner); } ?>" alt="">
                    </div>
                </div>
            </div>

            <?php
            $portfolio_content_h3 = CFS()->get('portfolio_content_h3'); // 'content_text' はフィールドの名前
            if ($portfolio_content_h3) {
                echo '<h3>' . esc_html($portfolio_content_h3) . '</h3>';
            }
            
            $portfolio_content_text = CFS()->get('portfolio_content_text'); // 'content_text' はフィールドの名前
            if ($portfolio_content_text) {
                echo '<p>' . esc_html($portfolio_content_text) . '</p>';
            }
                    
            $portfolio_site_link = CFS()->get('portfolio_site_link'); // 'site_link' はフィールドの名前
            if ($portfolio_site_link) {
                echo '<a href="' . esc_url($portfolio_site_link['url']) . '" class="portfolio-link" target="'.$portfolio_site_link['target'].'">'.esc_html($portfolio_site_link['text']) .'</a>';
            }
            ?>
        </div>
        <?php endwhile; ?>
        <?php endif; 
        wp_reset_postdata();?>
    </div>
</section>