<?php

//ナビメニューの設定
function register_my_menu()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu'),
        )
    );
}
add_action('init', 'register_my_menu');

// アイキャッチ画像のサポートを追加
function theme_setup()
{
    // アイキャッチ画像のサポート
    add_theme_support('post-thumbnails');

    // 投稿タイプごとにアイキャッチ画像をサポートする場合
    add_post_type_support('post', 'thumbnail'); // 通常の投稿タイプ
    add_post_type_support('page', 'thumbnail'); // 固定ページ
    // 必要に応じて他のカスタム投稿タイプも追加できます
}

add_action('after_setup_theme', 'theme_setup');

//ブログページが表示されている場合に個別のスタイルを適応させる
function my_enqueue_blog_styles()
{
    if (is_single()) {
        // ブログページの場合、スタイルシートを読み込む
        wp_enqueue_style('blog-styles', get_template_directory_uri() . '/site-date/css/blog-page.css');
    } else if (is_archive()) {
        // アーカイブページの場合、スタイルシートを読み込む
        wp_enqueue_style('archive-styles', get_template_directory_uri() . '/site-date/css/archive.css');
    }
}
add_action('wp_enqueue_scripts', 'my_enqueue_blog_styles');

//カスタム投稿(section02)に対してポートフォリオというカテゴリを付与
function add_category_to_section02(){
    register_taxonomy_for_object_type('category', 'section02'); //section02に対してカテゴリを適応
}
add_action('init', 'add_category_to_section02');

function include_section02_in_archive($query){
    // 管理画面（ダッシュボード）ではなく、メインのクエリであることを確認
    if(!is_admin() && $query->is_main_query()){
        // ホーム（投稿一覧）、カテゴリーページ、アーカイブページで処理を適用
        if(is_home() || is_category() || is_archive() ){
            // 通常の投稿（post）とカスタム投稿（section02）を両方取得するように設定
            $query->set('post_type', array('post', 'section02'));
        }
    }
}
// pre_get_posts フックを使い、メインクエリが実行される前に処理を変更
add_action('pre_get_posts', 'include_section02_in_archive');

function register_section02_post_type()
{
    register_post_type(
        'section02',
        array(
            'label'  => 'セクション02',
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
            'taxonomies' => array('category'), // カテゴリを適用
        )
    );
}
add_action('init', 'register_section02_post_type');

function webyayasu03_customize_register($wp_customize)
{
    /***********************************************
     *  heder関連のカスタマイザー       *
     ***********************************************/
    $wp_customize->add_panel('custom_header_panel', array(
        'title' => __('ヘッダーのカスタマイズ', 'mytheme'),
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
    $wp_customize->add_setting('custom_header_img', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_header_img_control', array(
        'label'    => __('ヘッダー画像', 'mytheme'),
        'section'  => 'custom_header_section',
        'settings' => 'custom_header_img',
    )));

    // プロファイル画像の設定
    $wp_customize->add_setting('custom_header_profile_img', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_header_profile_img_control', array(
        'label'    => __('プロファイル画像', 'mytheme'),
        'section'  => 'custom_header_section',
        'settings' => 'custom_header_profile_img',
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

    $wp_customize->add_section('custom_header_list_date', array(
        'title' => __('プロフィールデータ', 'mytheme'),
        'priority' => 20,
        'panel' => 'custom_header_panel'
    ));

    //データテキストの個数を管理
    $wp_customize->add_setting('custom_header_list_text_count', array(
        'default' => 3, // デフォルト値
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('custom_header_list_text_count_control', array(
        'label' => __('リストデータ数(個数指定する場合は初めに数値を保存公開、再リロードしてください)', 'mytheme'),
        'section' => 'custom_header_list_date',
        'settings' => 'custom_header_list_text_count',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,  // 最小値
            'max' => 5,  // 最大値
        ),
    ));

    $list_data_count = get_theme_mod('custom_header_list_text_count', 3);

    for ($i = 1; $i <= $list_data_count; $i++) {
        //データテキストの見出し設定
        $wp_customize->add_setting('custom_header_list_heading_setting_0' . $i, array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control('custom_header_list_heading_control_0' . $i, array(
            'label' => __('データタイトル' . ($i), 'mytheme'),
            'section' => 'custom_header_list_date',
            'settings' => 'custom_header_list_heading_setting_0' . $i,
            'type' => 'url',
        ));

        //データテキストのテキスト設定
        $wp_customize->add_setting('custom_header_list_text_setting_0' . $i, array(
            'default' => '',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control('custom_header_list_text_control_0' . $i, array(
            'label' => __('データテキスト' . ($i), 'mytheme'),
            'section' => 'custom_header_list_date',
            'settings' => 'custom_header_list_text_setting_0' . $i,
            'type' => 'url',
        ));
    }

    //ヘッダーpテキストの設定
    $wp_customize->add_setting('custom_header_text', array(
        'default' => '',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('custom_header_text_control', array(
        'label' => __('テキスト', 'mytheme'),
        'section' => 'custom_header_section',
        'settings' => 'custom_header_text',
        'type' => 'text',
    ));

    //ヘッダーsmsの設定
    $wp_customize->add_section('custom_header_sns_item', array(
        'title' => __('snsアイテム', 'mytheme'),
        'priority' => 50,
        'panel' => 'custom_header_panel',
    ));

    //snsアイテムを管理
    $wp_customize->add_setting('custom_header_sns_count', array(
        'default' => 3, // デフォルト値
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('custom_header_sns_count_control', array(
        'label' => __('SNSアイテム数(個数指定する場合は初めに数値を保存公開、再リロードしてください)', 'mytheme'),
        'section' => 'custom_header_sns_item',
        'settings' => 'custom_header_sns_count',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,  // 最小値
            'max' => 5,  // 最大値
        ),
    ));

    $sns_count = get_theme_mod('custom_header_sns_count', 3);
    for ($i = 1; $i <= $sns_count; $i++) {

        //画像の設定
        $wp_customize->add_setting('custom_header_sns_img_0' . $i, array(
            'default' => '',
            'transport' => 'refresh',
        ));
        // 画像のアップローダー
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_header_sns_img_control_0' . $i, array(
            'label' => __('sns画像' . $i, 'mytheme'),
            'section' => 'custom_header_sns_item',
            'settings' => 'custom_header_sns_img_0' . $i,
        )));

        //リンクURLの設定
        $wp_customize->add_setting('custom_header_sns_text_0' . $i, array(
            'default' => '',
            'transport' => 'refresh',
        ));
        //テキスト入力フィールド
        $wp_customize->add_control('custom_header_sns_text_control_0' . $i, array(
            'label' => __('snsテキスト' . $i, 'mytheme'),
            'section' => 'custom_header_sns_item',
            'settings' => 'custom_header_sns_text_0' . $i,
            'type' => 'url',
        ));
    }
    // ヘッダー画像フィルター設定
    $wp_customize->add_section('header_image_filter_section', array(
        'title'    => __('ヘッダー画像フィルター効果', 'mytheme'),
        'priority' => 30,
        'panel' => 'custom_header_panel',
    ));

    // フィルターの選択コントロール
    $wp_customize->add_setting('header_image_filter', array(
        'default'   => 'brightness(0.5)',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('header_image_filter_control', array(
        'label'    => __('Select Header Image Filter', 'mytheme'),
        'section'  => 'header_image_filter_section',
        'settings' => 'header_image_filter',
        'type'     => 'select',
        'choices'  => array(
            'none'          => __('None', 'mytheme'),
            'grayscale(100%)' => __('Grayscale', 'mytheme'),
            'sepia(100%)'     => __('Sepia', 'mytheme'),
            'blur(5px)'       => __('Blur', 'mytheme'),
            'brightness(0.5)' => __('Brightness', 'mytheme'),
            'contrast(150%)'  => __('Contrast', 'mytheme'),
        ),
    ));

    // セレクティブリフレッシュの設定
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('custom_header_logo', array(
            'selector'        => '.custom-header-logo',
            'render_callback' => 'mytheme_customize_partial_header_logo',
        ));
        $wp_customize->selective_refresh->add_partial('custom_header_img', array(
            'selector'        => '.custom-header-img',
            'render_callback' => 'mytheme_customize_partial_header_img',
        ));
        $wp_customize->selective_refresh->add_partial('custom_header_profile_img', array(
            'selector'        => '.custom-header-profile-img',
            'render_callback' => 'mytheme_customize_partial_header_profile_image',
        ));
        $wp_customize->selective_refresh->add_partial('custom_header_headline_h2', array(
            'selector'        => '.custom-header-headline-h2',
            'render_callback' => 'mytheme_customize_partial_header_headline_h2',
        ));
        for ($i = 1; $i <= $list_data_count; $i++) {
            $wp_customize->selective_refresh->add_partial('custom_header_list_heading_setting_0' . $i, array(
                'selector' => '.custom-header-list-heading_0' . $i,
                'render_callback' => 'mytheme_customize_partial_header_list_heading_0'.$i,
            ));
            $wp_customize->selective_refresh->add_partial('custom_header_list_text_setting_0' . $i, array(
                'selector' => '.custom-header-list-text_0' . $i,
                'render_callback' => 'mytheme_customize_partial_header_list_text_0' . $i,
            ));
        }
        $wp_customize->selective_refresh->add_partial('custom_header_text', array(
            'selector'        => '.custom-header-text',
            'render_callback' => 'mytheme_customize_partial_header_text',
        ));
    }
}
add_action('customize_register', 'webyayasu03_customize_register');

// カスタマイザーのライブプレビュー用スクリプトの追加
function mytheme_customize_preview_js()
{
    wp_enqueue_script('mytheme-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '1.0', true);
}
add_action('customize_preview_init', 'mytheme_customize_preview_js');

// パーシャルのレンダリングコールバック関数	
function mytheme_customize_partial_header_logo()
{
    return get_theme_mod('custom_header_logo');
}
function mytheme_customize_partial_header_img()
{
    return get_theme_mod('custom_header_img');
}
function mytheme_customize_partial_header_profile_image()
{
    return get_theme_mod('custom_header_profile_img');
}
function mytheme_customize_partial_header_headline_h2()
{
    return get_theme_mod('custom_header_headline_h2');
}
$list_data_count = get_theme_mod('custom_header_list_text_count', 3);
for ($i = 1; $i <= $list_data_count; $i++) {
   eval("
   function mytheme_customize_partial_header_list_heading_0$i(){
        return get_theme_mod('custom_header_list_heading_setting_0$i');
   }

   function mytheme_customize_partial_header_list_text_0$i(){
        return get_theme_mod('custom_header_list_text_setting_0$i');
   }
   ");
}
function mytheme_customize_partial_header_text()
{
    return get_theme_mod('custom_header_text');
}

// section-01(work)コンテンツ設定
function post_section01()
{
    $support = [
        'thumbnail',  //'サムネイル'
        'title',  //'タイトル'
        'editor',  //'記事本文'
    ];
    register_post_type('section01', array(
        'label' => 'workコンテンツ',
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => $support
    ));
}
add_action('init', 'post_section01');

// section-02(portfplio)コンテンツ設定
function post_section02()
{
    $support = [
        'thumbnail',  //'サムネイル'
        'title',  //'タイトル'
        'editor',  //'記事本文'
    ];
    register_post_type('section02', array(
        'label' => 'portfolioコンテンツ',
        'public' => true,
        'has_archive' => true,
        'menu_position' => 6,
        'supports' => $support
    ));
}
add_action('init', 'post_section02');

// section-03(skill)コンテンツ設定
function post_section03()
{
    $support = [
        'thumbnail',  //'サムネイル'
        'title',  //'タイトル'
        'editor',  //'記事本文'
    ];
    register_post_type('section03', array(
        'label' => 'skillコンテンツ',
        'public' => true,
        'has_archive' => true,
        'menu_position' => 6,
        'supports' => $support
    ));
}
add_action('init', 'post_section03');

// 投稿のアーカイブページを作成する
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'blog'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

//archiveページとcategoryページ内の記事抜粋の文字数を制限
function custom_excerpt_length($charlength)
{
    $excerpt = get_the_excerpt();
    $charlength++;
    if (mb_strlen($excerpt) > $charlength) { // 抜粋が指定された文字数より多い場合
        $subex = mb_substr($excerpt, 0, $charlength - 5); // 抜粋の一番初めの文字列から指定された文字から-5した分を格納
        $exwords = explode(' ', $subex); // 指定された文字列から分割、この場合はスペースで分割
        $excut = - (mb_strlen($exwords[count($exwords) - 1])); // 最後の単語の長さを取得
        if ($excut < 0) {
            echo mb_substr($subex, 0, $excut);
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}

function mytheme_register_block_editor_assets()
{
    // ブロックエディター用のJavaScript
    wp_register_script(
        'mytheme-block-editor',
        get_template_directory_uri() . '/my-custom-block/build/index.js',
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components'),
        filemtime(get_template_directory() . '/my-custom-block/build/index.js')
    );

    // ブロックエディター用のスタイル
    wp_register_style(
        'mytheme-block-editor-style',
        get_template_directory_uri() . '/my-custom-block/build/index.css',
        array(),
        filemtime(get_template_directory() . '/my-custom-block/build/index.css')
    );

    // フロントエンド用のスタイル
    wp_register_style(
        'mytheme-block-style',
        get_template_directory_uri() . '/my-custom-block/build/index.css',
        array(),
        filemtime(get_template_directory() . '/my-custom-block/build/index.css')
    );

    // ブロックを登録
    register_block_type(get_template_directory() . '/my-custom-block/build/block.json');
}
add_action('init', 'mytheme_register_block_editor_assets');
