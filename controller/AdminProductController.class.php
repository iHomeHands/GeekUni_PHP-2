<?php

class AdminProductController
{
    public function actionIndex()
    {
        require_once(Config::get('path_views') . '/admin_product/index.php');
        return true;
    }
}
