<?php

class AdminOrderController
{
    public function actionIndex()
    {
        require_once(Config::get('path_views') . '/admin_order/index.php');
        return true;
    }
}
