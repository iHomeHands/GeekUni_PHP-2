<?php

class AdminProductController
{
    public function actionIndex()
    {
        $productsList = [];
        require_once(Config::get('path_views') . '/admin_product/index.php');
        return true;
    }

    public function actionCreate()
    {
        $productsList = [];
        require_once(Config::get('path_views') . '/admin_product/create.php');
        return true;
    }
}
