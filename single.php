<?php get_header(); ?>

<main>
    <div class="top-pading"></div><!--ヘッダーとの重なりを防ぐスペース-->
    <!-- ページtracking機能を付与 -->
    <?php get_template_part('template-parts/section', 'page-tracking') ?>

    <?php
    // WordPress のループ開始
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>

            <section class="blog-page">
                <div class="blog-header">
                    <p class="time-data"><?php echo __('更新日'); ?><time
                            datetime="<?php echo get_the_date('Y/m/d'); ?>"><?php echo get_the_date(); ?></time></p>
                    <p class="category-name">
                        <?php
                        // 記事のカテゴリーを取得
                        $categories = get_the_category();

                        // カテゴリーが存在する場合
                        if (! empty($categories)) {
                            // 最初のカテゴリーを取得
                            $category = $categories[0];

                            // カテゴリーのリンクを表示
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                        }
                        ?>
                    </p>
                </div>
                <h1><?php echo the_title(); ?></h1>

                <?php if (has_post_thumbnail()): ?>
                    <div class="img thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>

                </div>

                <div class="blog-content">
                    <?php the_content(); ?>
                </div>
                <div class="pagination">
                    <ul>
                <!--通常の投稿記事とカスタム投稿記事が混ざった記事リンクを取得する処理-->
                <?php 
                //現在の投稿IDと投稿タイプを取得
                $current_id = get_the_ID();
                $current_type = get_post_ID();
                
                ?>
                        <!--カスタム投稿(section02)のリンクを取得する場合-->
                        <?php if (is_singular('section02')): ?>
                            <li>
                                <?php
                                $prev_post = get_previous_post(true, '', 'section02');
                                if (($prev_post)):
                                ?>
                                    <a id="prev" href="<?php echo get_permalink($prev_post->ID); ?>">← prev</a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <?php
                                $next_post = get_next_post(true, '', 'section02');
                                if (($next_post)):
                                ?>
                                    <a id="next" href="<?php echo get_permalink($next_post->ID); ?>">next →</a>
                                <?php endif; ?>
                            </li>

                            <!--通常の投稿リンクを取得する場合-->
                        <?php elseif (is_single()): ?>
                            <li>
                                <?php
                                $prev_post = get_previous_post();
                                if (($prev_post)):
                                ?>
                                    <a id="prev" href="<?php echo get_permalink($prev_post->ID); ?>">← prev</a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <?php
                                $next_post = get_next_post();
                                if (($next_post)):
                                ?>
                                    <a id="next" href="<?php echo get_permalink($next_post->ID); ?>">next →</a>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </section>

    <?php
        endwhile;
    else :
        // 投稿がない場合の処理
        echo __('投稿が見つかりませんでした。');
    endif;
    // WordPress のループ終了
    ?>

</main>

<?php get_footer(); ?>