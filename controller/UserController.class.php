<?php

class UserController
{
    public function actionRegister()
    {
        $name = false;
        $email = false;
        $password = false;
        $result = false;

        require_once(Config::get('path_views') . '/user/register.php');
        return true;
    }

    public function actionLogin()
    {
        $email = false;
        $password = false;

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
