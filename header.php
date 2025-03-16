<?php
$header_logo = get_theme_mod('custom_header_logo');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/site-date/css/sanitize.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/site-date/css/style.css">
    <link rel="stylesheet"
        href="<?php echo get_template_directory_uri(); ?>/site-date/slick-1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/site-date/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/site-date/css/slick-setting.css">
    <!-- Prettifyのスタイルとスクリプト -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
    <!-- Doxygenのスタイルを適用 -->
    <script src='https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=doxy'></script>
    <title>ウェブ制作のことならwebyayasuへ</title>
    <?php wp_head(); ?>
</head>
<style type="text/css">
    .header-img {
        filter: <?php echo get_theme_mod('header_image_filter', 'brightness(0.5)'); ?>;
    }
</style>

<body>
    <div id="particles-js">
    </div>

    <header>
        <div class="menu-content hide">
            <div class="img logo custom-header-logo">
                <a href="<?php echo get_home_url(); ?>">
                    <?php if ($header_logo) : ?>
                        <img src="<?php echo esc_url(get_theme_mod('custom_header_logo')); ?>" alt="">
                    <?php else : ?>
                        <img src="<?php echo esc_url($header_logo); ?>" alt="">
                    <?php endif; ?>

                </a>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="menu">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary-menu',
                        'container' => true,
                        'menu_class' => '', // クラス名が必要な場合はここに指定
                        'items_wrap' => '<ul>%3$s</ul>', // デフォルトで `<ul>` タグが追加されます
                    )
                );
                ?>
            </nav>
        </div>
    </header>