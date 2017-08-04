<?php

class AdminOrderController
{
    public function actionIndex()
    {
        $ordersList = Order::getOrdersList();
        require_once(Config::get('path_views') . '/admin_order/index.php');
        return true;
    }

    public function actionCreate()
    {
        require_once(Config::get('path_views') . '/admin_order/create.php');
        return true;
    }

    public function actionView()
    {
        require_once(Config::get('path_views') . '/admin_order/view.php');
        return true;
    }

    public function actionDelete()
    {
        require_once(Config::get('path_views') . '/admin_order/delete.php');
        return true;
    }
}
