<?php

function webyayasu03_customize_register( $wp_customize ) {
    // ヘッダーパネル追加
    $wp_customize->add_panel('custom_header_panel', array(
        'title' => __('ヘッダーのカスタマイズ','mytheme'),
        'description' => __('ヘッダーの画像、テキストなどを変更できます。', 'mytheme'),
        'priority' => 10,
    ));
    
    // セクション追加
    $wp_customize->add_section('custom_header_section', array(
        'title' => __('ヘッダーコンテンツ', 'mytheme'),
        'priority' => 10,
        'panel' => 'custom_header_panel',
    ));

     // ロゴ画像の設定
     $wp_customize->add_setting('custom_header_logo', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_header_logo_control', array(
        'label'    => __('ロゴ画像', 'mytheme'),
        'section'  => 'custom_header_section',
        'settings' => 'custom_header_logo',
    )));
    
    // ヘッダー画像の設定
    $wp_customize->add_setting('custom_header_image', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_header_image_control', array(
        'label'    => __('ヘッダー画像', 'mytheme'),
        'section'  => 'custom_header_section',
        'settings' => 'custom_header_image',
    )));

    //ヘッダーh2テキストの設定
    $wp_customize->add_setting('custom_header_headline_h2', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('custom_header_headline_h2_control', array(
        'label' => __('h2テキスト', 'mytheme'),
        'section' => 'custom_header_section',
        'settings' => 'custom_header_headline_h2',
        'type' => 'text',
    ));

     //ヘッダーpテキストの設定
     $wp_customize->add_setting('custom_header_text', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('custom_header_text_control', array(
        'label' => __('h2テキスト', 'mytheme'),
        'section' => 'custom_header_section',
        'settings' => 'custom_header_text',
        'type' => 'text',
    ));


    // セレクティブリフレッシュの設定
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('custom_header_logo', array(
            'selector'        => '.custom-header-logo',
            'render_callback' => 'mytheme_customize_partial_header_logo',
        ));
        $wp_customize->selective_refresh->add_partial('custom_header_image', array(
            'selector'        => '.custom-header-image',
            'render_callback' => 'mytheme_customize_partial_header_image',
        ));
        $wp_customize->selective_refresh->add_partial('custom_header_headline_h2', array(
            'selector'        => '.custom-header-headline-h2',
            'render_callback' => 'mytheme_customize_partial_header_headline_h2',
        ));
        $wp_customize->selective_refresh->add_partial('custom_header_text', array(
            'selector'        => '.custom-header-text',
            'render_callback' => 'mytheme_customize_partial_header_text',
        ));
    }
}
add_action('customize_register', 'webyayasu03_customize_register');

// カスタマイザーのライブプレビュー用スクリプトの追加
function mytheme_customize_preview_js() {
    wp_enqueue_script('mytheme-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '1.0', true);
}
add_action('customize_preview_init', 'mytheme_customize_preview_js');

// パーシャルのレンダリングコールバック関数	
function mytheme_customize_partial_header_logo() {	
    return get_theme_mod('custom_header_logo');	
}	
function mytheme_customize_partial_header_image() {	
    return get_theme_mod('custom_header_image');	
}	
function mytheme_customize_partial_header_headline_h2() {
    return get_theme_mod( 'custom_header_headline_h2' );
}
function mytheme_customize_partial_header_text() {
    return get_theme_mod( 'custom_header_text' );
}
?>