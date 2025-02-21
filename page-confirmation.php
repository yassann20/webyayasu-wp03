<?php

session_start();

$_SESSION["nam"] = htmlspecialchars($_POST["name"]);
$_SESSION["kana"] = htmlspecialchars($_POST["kana"]);
$_SESSION["mail"] = htmlspecialchars($_POST["email"]);
$_SESSION["message"] = htmlspecialchars($_POST["message"]);

var_dump($_SESSION["nam"]);

?>

<?php get_header(); ?>

<main>

    <div class="confirmation">
        <div class="sections-text-scale">
            <div class="sections-title">
                <h2>お問い合わせ内容確認</h2>
            </div>
            <p class="section-text">
                お問い合わせ内容にお間違いがなければ送信ボタンを押してください。
            </p>
        </div>
    </div>

</main>

<?php get_footer(); ?>