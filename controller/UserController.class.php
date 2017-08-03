<?php

class UserController
{
    public function actionRegister()
    {
        require_once(Config::get('path_views') . '/user/register.php');
        return true;
    }

    public function actionLogin()
    {
        require_once(Config::get('path_views') . '/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /");
    }
}
