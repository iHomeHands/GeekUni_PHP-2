<?php

class ProductController
{
    public function actionView()
    {
        $categories=Category::getCategories();
        $product = [];
        require_once(Config::get('path_views') . '/product/view.php');
        return true;
    }
}
