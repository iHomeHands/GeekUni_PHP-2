<?php

class ProductController
{
    public function actionView()
    {
        $categories=[['id'=>0,'name'=>'Test']];
        $product = [];
        require_once(Config::get('path_views') . '/product/view.php');
        return true;
    }
}
