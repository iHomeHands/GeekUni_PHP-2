<?php

class AdminController
{
    public function actionIndex()
    {
        require_once(Config::get('path_views') . '/admin/index.php');
        return true;
    }
}
