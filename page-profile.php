<?php

$header_profile_img = get_theme_mod('custom_header_profile_img');
get_header();

?>

<main>
    <div class="top-pading"></div><!--ヘッダーとの重なりを防ぐスペース-->
    <section class="about">
        <div class="hero-profile">
            <div class="img">
                <?php if ($header_profile_img) : ?>
                    <img class="hero-profile_img" src="<?php echo $header_profile_img; ?>" alt="">
                <?php else : ?>
                    <img class="hero-profile_img" src="<?php echo esc_url($header_profile_img); ?>" alt="">
                <?php endif; ?>
            </div>
            <ul>
                <li>氏名 : <ruby>安崎<rt>ヤスザキ</rt></ruby>&nbsp;<ruby>海星<rt>カイセイ</rt></ruby></li>
                <li>職種 : エンジニア</li>
                <li>出身地 : 北海道 札幌市</li>
            </ul>
        </div>
        <div class="hero-text">

            <p>初めまして。この度はお忙しい中、貴重なお時間を割いて当サイトにお越しいただき、ありがとうございます。フロントエンドエンジニアの安崎と申します。<br>現在、私は地元札幌市のシステム開発会社でJavaを使用したバックエンド開発を行いながら、個人でフロントエンド開発の仕事をしています。基本的なウェブページのコーディングスキルに加え、PHPを使用したサーバーサイド技術や、Javaを用いたバックエンド開発技術も有しており、フロントエンドからバックエンドまで幅広い知識を持っています。<br>現在、クラウドソーシングなどを通じてフロントエンドのコーディング業務を中心にお受けしております。もしご縁があれば、お気軽にお仕事に関するご相談をいただければと思っております。</p>
        </div>
    </section>

    <section class="background">
        <div class="table-container">
            <table>
                <tbody>
                    <tr>
                        <td colspan="4" style="text-align: center;">これまでの業務経歴</td>
                    </tr>
                    <tr>
                        <td>令和2年8月～現在</td>
                        <td>株式会社クラウドワークス</td>
                        <td>個人デザイナーとして活動している方との業務委託</td>
                        <td>・住宅系LPのコーディング(複数本)<br>・フィットネスジムLPのコーディング(複数本)<br>・wordpressカスタマイズ<br>・お問い合わせフォームのコーディング(サーバーサイド含む)などを担当<br>使用スキル ( html / css / javascript / php / mysql / github )</td>
                    </tr>
                    <tr>
                        <td>令和3年8月～現在</td>
                        <td>オリクション株式会社</td>
                        <td>フロントエンドエンジニアとして業務委託</td>
                        <td>大手医薬品会社様およびサプリメント会社様のLPを月に数本規模でデザインの再現性を重視したコーディングを担当<br>使用スキル ( html / css / javascript / react.js / github )</td>
                    </tr>
                    <tr>
                        <td>令和7年1月～現在</td>
                        <td>株式会社ホットスタッフ</td>
                        <td>バックエンドエンジニアとして入社</td>
                        <td>企業様向けの顧客情報管理サイトのフロントエンド・バックエンドコーディングを担当しています。<br>使用スキル ( html / css / javascript / java / PostgreSQL / github )</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>
    <?php get_template_part('template-parts/section', 'skill') ?>



    <?php get_template_part('template-parts/section', 'contact') ?>

</main>

<?php get_footer(); ?>