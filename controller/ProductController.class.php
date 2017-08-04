<?php

class ProductController
{
    public function actionView($productId)
    {
        $categories=Category::getCategories();

        $product = Good::getProductById($productId);

        require_once(Config::get('path_views') . '/product/view.php');

        return true;
    }
}
