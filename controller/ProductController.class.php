<?php

class ProductController
{
    public function actionView()
    {
        require_once(Config::get('path_views') . '/product/view.php');
        return true;
    }
}
