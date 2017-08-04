<?php

class AdminCategoryController
{
    public function actionIndex()
    {
        require_once(Config::get('path_views') . '/admin_category/index.php');
        return true;
    }
}
