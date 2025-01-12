<?php include get_template_directory().'/template-parts/variables.php'; //各スキルのクラス名、表示名を格納した多次元配列を取得 78行目　変数名は$skill_classを参照?>
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
                echo '<p class="text">' . esc_html($portfolio_content_text) . '</p>';
            }?>
            <div class="portfolio_content_profile">
                <p class="time-data"><time datetime="<?php echo get_the_date('Y/m/d'); ?>"><img src="http://localhost/wordpress/wp-content/uploads/2025/01/clock-icon.png" alt="time"><?php echo get_the_date(); ?></time></p><!--投稿時間-->
                <p>
                    <?php
                    $portfolio_genre = CFS()->get('portfolio_genre'); //制作ジャンルを取得
                    if($portfolio_genre){
                        echo esc_html($portfolio_genre);
                    }
                    ?>
                </p>
            </div>
            <div class="portfolio_content_use_skill">
                <?php

                for( $i=0; $i<count($skill_class); $i++){
                    $portfolio_skill = CFS()->get('portfolio_skills_'.$skill_class[$i][0]);//cfsで取得する際はhtmlの場合は[ portfolio_skills_html ]と記載
                    if($portfolio_skill){
                        $skill_class_name = htmlspecialchars($skill_class[$i][1], ENT_QUOTES, 'UTF-8');
                        $portfolio_skill_text = htmlspecialchars($portfolio_skill, ENT_QUOTES, 'UTF-8');
                       echo '<span class="'.$skill_class_name.'">'.$portfolio_skill."</span>";
                    }
                }
                ?>
            </div>
            <?php
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