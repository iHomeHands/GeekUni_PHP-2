<?php

class CartController
{
    public function actionIndex()
    {
        $categories = [];//Category::getCategoriesList();

        $productsInCart = [];//Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);

            $products = Good::getProdustsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(Config::get('path_views') . '/cart/index.php');
        return true ;
    }
}
