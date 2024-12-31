<section id="skill" class="section-skill">
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
            'orderby' => 'menu_order',  // プラグインの並び順を使用
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                ?>
        <div class="skill-content__item hide skill-fade-up">
            <div class="img">
                <!--サムネイル画像を出力-->
                <?php if(has_post_thumbnail() ): ?>
                <?php the_post_thumbnail(); ?>
                <?php endif; ?>
            </div>
            <div class="skill-content__item__text">
                <?php
                $skill_content_h3 = CFS()->get('skill_content_h3');
                if($skill_content_h3){
                    echo '<h3>'.esc_html($skill_content_h3).'</h3>';
                }
                ?>
                <div class="img-star">
                    <?php
                    $skill_star_img = CFS()->get('skill_star_img');
                    if($skill_star_img){
                        echo '<img src="'.esc_url($skill_star_img).'" alt="">';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>