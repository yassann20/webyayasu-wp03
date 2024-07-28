<?php
$header_logo = get_theme_mod( 'custom_header_logo' );
$header_image = get_theme_mod( 'custom_header_image' );
$header_headline_h2 = get_theme_mod( 'custom_header_headline_h2' );
$header_text = get_theme_mod( 'custom_header_text' );

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/site-date/css/sanitize.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/site-date/css/style.css">
    <title>webyayasu</title>
    <?php wp_head(); ?>
</head>

<body>
    <div id="particles-js">
    </div>

    <header>
        <div class="menu-content hide">
        <div class="img logo custom-header-logo">
            <a href="">
                <?php if( $header_logo) :?>
                    <img src="<?php echo esc_url( get_theme_mod( 'custom_header_logo' ) ); ?>" alt="" class="custom-header-logo">
                <?php else :?>
                    <img src="<?php echo esc_url($header_logo); ?>" alt="">
                    <?php endif; ?>

            </a>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="">hello</a></li>
                <li><a href="">hello</a></li>
                <li><a href="">hello</a></li>
                <li><a href="">hello</a></li>
            </ul>
        </nav>
        </div>
        <div class="header-img img custom-header-image" style="background-image: url('<?php echo $header_image ? esc_url($header_image) : get_template_directory_uri() . '/site-date/photos/sitecodding.jpg'; ?>');">
        </div>
        <div class="content-profile hide">
            <div class="img">
                <img src="" alt="">
            </div>
            <div class="content-profile_text">
            <h2 class="custom-header-headline-h2">
            <?php if ( $header_headline_h2 ) : ?>
            <?php echo esc_html( $header_headline_h2 ); ?>
            <?php else: ?>
                ようこそ
            <?php endif; ?>
            </h2>
            <p class="custom-header-text">
            <?php if ( $header_text ) : ?>
            <?php echo esc_html( $header_text ); ?>
            <?php else: ?>
                ウェブプログラマーの安崎 海星です、
                ウェブデザインからフロントエンドプログラミングまで幅広く対応します。
            <?php endif; ?>
            </p>
                <a href="">more me</a>
            </div>
        </div>
    </header>