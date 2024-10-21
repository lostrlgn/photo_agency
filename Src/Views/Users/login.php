<section class="user-login-auth">
    <div class="container">
        <div class="row">
            <div class=" col-6 col-md-5">
                <h1>Вход</h1>
                <?php if(!empty($error)): ?>
                    <div style="background-color: red"><?= $error?></div>
                    <?php endif; ?>
                <form class="comment-form" action="/users/login" method="POST">
                
                    <label for="name">Email <input type="text" name="email" value="<?= $_POST['email'] ?? ''?>"></label>         
                    <label for="comment">Пароль <input type="text" name="password" value="<?= $_POST['password']?? '' ?>"></label>
                    <button type="submit">Submit</button>
                </form>
                <div class="register-redirection">
                    Вы не зарегистрированы? <a href="/users/register" class="register-link">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>

</section>