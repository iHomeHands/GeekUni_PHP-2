<?php

class AdminUserController
{
    public function actionIndex()
    {
        $usersList = User::getUsers();
        require_once(Config::get('path_views') . '/admin_user/index.php');
        return true;
    }
}
