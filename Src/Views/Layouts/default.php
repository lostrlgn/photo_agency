<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фотоагентство</title>
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <!-- <base href="/agencyapi/css" target="_self"> -->
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.min.css"> -->
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <ul class="menu">
                    <li class="menu_item"><a href="#" class="menu_link">Главная</a></li>
                    <li class="menu_item"><a href="index_price.html" class="menu_link">Цены</a></li>
                    <li class="menu_item"><a href="#require" class="menu_link">Команда</a></li>
                    <li class="menu_item"><a href="index_contacts.html" class="menu_link">Контакты</a></li>
                    <li class="login-button"><a href="/users/login">Login</a></li>
                </ul>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <div class="subheader">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-5 offset-md-1">
                        <a href="#" class="subheader_logo"><img src="../img/icons/logo.png" alt="logo"></a>
                        <div class="subheader_official">Профиональное уникальное фотоагество в Санкт-Петербурге</div>
                    </div>
    
                    <div class="xs-hidden col-md-3 col-xl-3">
                        <div class="subheader_call">Позвоните нам для консультирования</div>
                        <a href="tel:+79005652020" class="subheader_phone">+7 900 565 20 20</a>
                    </div>
    
                    <div class="col-6 col-md-3">
                        <a href="tel:+79005652020" class="xs-visible subheader_phone">+7 900 565 20 20</a>
                        <button class="subheader_btn">заказать звонок</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?= $content ?>
    <footer>
        <div class="footer_divider"></div>
        <div class="footer_wrapper">
            <div>
                <div class="footer_social">
                    <a href="#" class="footer_social_item">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="footer_social_item">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="footer_social_item">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div>
                <div class="footer_links">
                    <div class="footer_links_main">
                        <a href="index.html">на главную</a>
                        <a href="index_price.html">цены</a>
                        <a href="index_contacts.html">контакты</a>
                    </div>
                    <div class="footer_links_sub">
                        <a href="index.html">команда </a>
                        <a href="#"> центр поддержки</a>

                    </div>
                    <a href="#" class="footer_links_lang">Русский</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>