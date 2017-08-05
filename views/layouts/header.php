<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Title</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/">Главная</a></li>
                            <!--
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/catalog/">Каталог товаров</a></li>
                                    <li><a href="/cart/">Корзина</a></li>
                                </ul>
                            </li> -->
                            <li><a href="/catalog/">Каталог товаров</a></li>
                            <li><a href="/cart/">Корзина</a></li>
                            <li><a href="/about/">О магазине</a></li>
                            <li><a href="/contacts/">Контакты</a></li>
                            <li><a href="/admin">Admin</a></li>
                            <?php if (User::isGuest()): ?>
                                <li><a href="/user/register">Регистрацияr</a><li></li>
                                <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                            <?php else: ?>
                                <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                                <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->



</header>
