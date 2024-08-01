<?php get_header(); ?>

<main> 

<section class="archive">
        <div class="categorys">
            <ul>
            <?php
                $categories = get_categories();
                foreach ( $categories as $category ) {
                    echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
                }
                ?>
            </ul>
        </div>
        <div class="archive-text">
            <h2>アーカイブページ一覧</h2>
        </div>
        <div class="archive-content">

        <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                );
                $query = new WP_query($args);

                if( $query -> have_posts()) : 
                    while( $query -> have_posts()) :
                        $query -> the_post(); 
                ?>

<article class="archive-content_item">
                <a href="<?php the_permalink(); ?>">
                <div class="img">
                <?php if(has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/photos/pc/topsample.jpg" alt="">
                            <?php endif; ?>
                </div>
                <div class="post">
                <div class="post-meta">
                <time datetime="<?php echo get_the_date('Y/m/d'); ?>"><?php echo get_the_date(); ?></time>
                    <p class="category"><?php echo get_the_category()[0]->name; ?></p>
                </div>
                <div class="post-text">
                    <h3 class="title"><?php the_title(); ?></h3>
                    <p><?php custom_excerpt_length(50); ?></p>
                </div>
            </div>
                </a>
            </article>

<?php
                endwhile;
            else: 
                echo __('投稿が見つかりませんでした。');
            endif; 
                ?>
        </div>
        <div class="pagination">
            <ul>
                <li><a id="prev" href="">← prev</a></li>
                <li><a id="next" href="">next →</a></li>
            </ul>
        </div>
      </section>

      </main>

<?php get_footer(); ?>