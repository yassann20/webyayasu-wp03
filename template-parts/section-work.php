<section class="section-work">
            <div class="sections-text-scale">
                <div class="sections-title">

                    <h2>work</h2>
                </div>
                <p class="section-text">当方ではデザインからコーディング、立ち上げ後の保守などを請け負っています。ウェブサイトに関わる案件であれば柔軟に対応可能ですので、お気軽にご相談ください。
                </p>
            </div>
            <div class="work-content">
                <div class="work-content_item hide">
                    <!--section01(work)のコンテンツを出力-->
<?php
        // カスタム投稿タイプ「section01」のクエリ
        $args = array(
            'post_type'      => 'section01',
            'posts_per_page' => 10, // 表示する投稿数
            'order'          => 'DESC', // 降順
            'orderby'        => 'date' // 投稿日で並べる
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                ?>
                    <div class="img">
        <!--サムネイル画像を出力-->
                        <?php if(has_post_thumbnail() ): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                    </div>
                    <h3><?php the_title(); //タイトルを出力?></h3>
                    <p><?php the_content(); //投稿本文を出力?></p>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>