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
        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }

    public function actionDelete($id)
    {
        Cart::deleteProduct($id);

        header("Location: /cart");
    }

    public function actionCheckout()
    {
        $productsInCart = Cart::getProducts();

        if ($productsInCart == false) {
            header("Location: /");
        }

        $categories = Category::getCategoriesList();

        $productsIds = array_keys($productsInCart);
        $products = Good::getProdustsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        $totalQuantity = Cart::countItems();

        $userName = false;
        $userPhone = false;
        $userComment = false;

        $result = false;
        /*
        if (!User::isGuest()) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
            $userId = false;
        }*/

        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            $errors = false;
            /*
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }*/


            if ($errors == false) {
                $result = Order::createOrder($userName, $userPhone, $userComment, $userId, $productsInCart);

                if ($result) {
                    /*
                    $adminEmail = 'php.start@mail.ru';
                    $message = '<a href="http://digital-mafia.net/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);
                    */
                    Cart::clear();
                }
            }
        }

        require_once(Config::get('path_views') . '/cart/checkout.php');
        return true;
    }
}
