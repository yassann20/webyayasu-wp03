<section class="section-contact">
    <div class="sections-title">
        <h2>contact</h2>
    </div>
    <form action="<?php echo home_url('/confirmation/'); ?>" method="post">
        <label for="name">
            <h3>お名前</h3>
            <input type="text" name="name" id="name" required>
        </label>
        <label for="kana">
            <h3>おなまえ</h3>
            <input type="text" name="kana" id="kana" required>
        </label>
        <label for="email">
            <h3>メールアドレス</h3>
            <input type="email" name="email" id="email" required>
        </label>
        <label for="message">
            <h3>お問い合わせ内容</h3>
            <textarea name="message" id="message"></textarea>
        </label>
        <button type="submit">送信</button>
    </form>
</section>