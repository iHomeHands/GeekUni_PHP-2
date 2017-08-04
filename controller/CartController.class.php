<?php

class CartController
{
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();
        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);

            $products = Good::getProdustsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(Config::get('path_views') . '/cart/index.php');
        return true ;
    }

    public function actionAdd($id)
    {
        // Добавляем товар в корзину
        Cart::addProduct($id);

        // Возвращаем пользователя на страницу с которой он пришел
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax($id)
    {
        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
        echo Cart::addProduct($id);
        return true;
    }
}
