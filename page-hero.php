<?php get_header(); ?>

<?php get_template_part('template-parts/section', 'hero') ?>

<main>
    <div class="top-pading"></div><!--ヘッダーとの重なりを防ぐスペース-->
    <section class="about">
        <div class="img">
            <img src="" alt="" class="hero-profile_img" />
        </div>
        <p>初めまして。この度はお忙しい中、貴重なお時間を割いて当サイトにお越しいただき、ありがとうございます。フロントエンドエンジニアの安崎海星（やすざき かいせい）と申します。<br>現在、私は地元札幌市のシステム開発会社でJavaを使用したバックエンド開発を行いながら、個人でフロントエンド開発の仕事をしています。基本的なウェブページのコーディングスキルに加え、PHPを使用したサーバーサイド技術や、Javaを用いたバックエンド開発技術も有しており、フロントエンドからバックエンドまで幅広い知識を持っています。<br>現在、クラウドソーシングなどを通じてフロントエンドのコーディング業務を中心にお受けしております。もしご縁があれば、お気軽にお仕事に関するご相談をいただければと思っております。</p>
    </section>
    <?php get_template_part('template-parts/section', 'skill') ?>

    <?php get_template_part('template-parts/section', 'contact') ?>

</main>

<?php get_footer(); ?>