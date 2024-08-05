<?php
session_start();

$_SESSION["nam"] = htmlspecialchars($_POST["nam"]);
$_SESSION["kana"] = htmlspecialchars($_POST["kana"]);
$_SESSION["mail"] = htmlspecialchars($_POST["email"]);
$_SESSION["message"] = htmlspecialchars($_POST["message"]);
$_SESSION["IP"] = $_SERVER['REMOTE_ADDR'];

?>

<?php get_header(); ?>

<main>

<!--セッションに値がある場合は送信確認-->
<?php if( !empty($_SESSION["nam"]) && !empty($_SESSION["kana"]) && !empty($_SESSION["mail"]) && !empty($_SESSION["message"]) && !empty($_SESSION["IP"]) ):?>
<section class="confirm">
<div class="sections-text-scale">
        <div class="sections-title">
            <h2>お問い合わせ内容確認</h2>
        </div>
    </div>
        <div class="confirm">
            <div class="confirm-content">
                <h3>名前</h3>
                <p><?php echo $_SESSION["nam"]; ?></p>
            </div>
            <div class="confirm-content">
                <h3>おなまえ</h3>
                <p><?php echo $_SESSION["kana"]; ?></p>
            </div>
            <div class="confirm-content">
                <h3>メールアドレス</h3>
                <p><?php echo $_SESSION["mail"]; ?></p>
            </div>
            <div class="confirm-content">
                <h3>お問い合わせ内容</h3>
                <p><?php echo $_SESSION["message"]; ?></p>
            </div>
        </div>
        <p class="section-text">
            お問い合わせ内容にお間違いがなければ送信ボタンを押してください。
        </p>
        <div class="button-area">
        <a href="<?php echo home_url('/semd'); ?>">送信</a>
        </div>
    </div>
</div>
</section>
<!--セッションにすべてそろっていなければ再度入力画面を表示-->
<?php else: ?>

    <section class="section-contact">
    <div class="sections-title">
        <h2>contact</h2>
        <p>入力内容に誤りが見つかりました、お手数ですが初めから入力をし直し、再度確認ボタンを押してください。</p>
    </div>
    <form action="<?php echo home_url('/confirm'); ?>" class="hide" method="post">
                <label for="">
                    <h3>お名前</h3>
                    <input type="text" name="nam" id="" >
                </label>
                <label for="">
                    <h3>おなまえ</h3>
                    <input type="text" name="kana" id="">
                </label>
                <label for="">
                    <h3>メールアドレス</h3>
                    <input type="email" name="email" id="">
                </label>
                <label for="">
                    <h3>お問い合わせ内容</h3>
                    <textarea name="message" id="message"></textarea>
                </label>
                <button type="submit">送信</button>
                <p>※いたずら防止のためIPアドレスを保存しています。</p>
            </form>
</section>

<?php endif;?>
</main>

<?php get_footer(); ?>