<?php
$header_logo = get_theme_mod('custom_header_logo');
$header_image = get_theme_mod('custom_header_img');
$header_profile_img = get_theme_mod('custom_header_profile_img');
$header_headline_h2 = get_theme_mod('custom_header_headline_h2');

$header_list_data_count = get_theme_mod('custom_header_list_text_count', 3);
$header_list_title = [];
$header_list_text = [];
for($i=1; $i<=$header_list_data_count; $i++){
    $header_list_title[$i] = get_theme_mod('custom_header_list_heading_setting_0'.$i);
    $header_list_text[$i] = get_theme_mod('custom_header_list_text_setting_0' . $i);
}

$header_sns_count = get_theme_mod('custom_header_sns_count', 3);
$header_text = get_theme_mod('custom_header_text');
$header_sns_img = [];
$header_sns_text = [];
for($i=1; $i<=$header_sns_count; $i++){
    $header_sns_img[$i] = get_theme_mod('custom_header_sns_img_0' . $i);
    $header_sns_text[$i] = get_theme_mod('custom_header_sns_text_0' . $i);
}

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
        <div class="header-view hide">
            <div class="header-img custom-header-img"
                style="background-image: url('<?php echo $header_image ? esc_url($header_image) : get_template_directory_uri() . '/site-date/photos/sitecodding.jpg'; ?>');">
            </div>
            <div class="content-profile">
                <div class="img">
                    <?php if ($header_profile_img) : ?>
                        <img class="custom-header-profile-img" src="<?php echo $header_profile_img; ?>" alt="">
                    <?php else : ?>
                        <img class="custom-header-profile-img" src="<?php echo esc_url($header_profile_img); ?>" alt="">
                    <?php endif; ?>
                </div>
                <div class="content-profile_text">
                    <h2 class="custom-header-headline-h2">
                        <?php if ($header_headline_h2) : ?>
                            <?php echo esc_html($header_headline_h2); ?>
                        <?php else: ?>
                            ようこそ
                        <?php endif; ?>
                    </h2>
                    <ul>
                        <?php
                        for($i=1; $i<=$header_list_data_count; $i++){
                            echo '<li><span class="custom-header-list-heading_0'.$i.'">'.$header_list_title[$i].'</span> : <span class="custom-header-list-text_0'.$i.'">'. $header_list_text[$i] ."</span></li>";
                        }
                        ?>
                    </ul>
                    <p class="custom-header-text">
                        <?php if ($header_text) : ?>
                            <?php echo esc_html($header_text); ?>
                        <?php else: ?>
                            ウェブプログラマーの安崎 海星です、
                            ウェブデザインからフロントエンドプログラミングまで幅広く対応します。
                        <?php endif; ?>
                    </p>
                </div>
                <div class="SNS">
                    <ul>
                    <?php
                    for($i = 1; $i<=$header_sns_count/*カスタマイザーで指定した値を出力デフォルトでは3つ */; $i++){
                        if ($header_sns_img[$i] && $header_sns_text[$i]){
                        echo "<li><a href=\"" . $header_sns_text[$i] . "\"><img src=\"" . $header_sns_img[$i] . "\" alt=\"\"></a></li>";
                        }else{
                            break;
                        }
                    }
                    ?> 
                    </ul>
                </div>
            </div>
        </div>
    </header>