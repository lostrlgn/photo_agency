<section class="user-login-auth">
    <div class="container">
        <div class="row">
            <div class=" col-6 col-md-5">
                <h1>Регистрация</h1>
                <?php if(!empty($error)): ?>
                    <div style="background-color: red"><?= $error?></div>
                    <?php endif; ?>
                <form class="comment-form"  action="/users/register" method="POST">
                    <label for="name">Nickname <input type="text" name="nickname" value="<?= $_POST['nickname'] ?? ''?>"></label>
                    <label for="name">Email <input type="text" name="email" value="<?= $_POST['email'] ?? ''?>"></label>        
                    <label for="comment">Пароль <input type="text" type="password" name="password" value="<?= $_POST['password']?? '' ?>"></label>
                    <button type="submit">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</section>