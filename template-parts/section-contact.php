<section id="contact" class="section-contact">
    <div class="sections-title">
        <h2>contact</h2>
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
                <p class="ip">※いたずら防止のためIPアドレスを保存しています。</p>
            </form>
</section>