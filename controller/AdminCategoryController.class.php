<?php

class AdminCategoryController
{
    public function actionIndex()
    {
        require_once(Config::get('path_views') . '/admin_category/index.php');
        return true;
    }

    public function actionCreate()
    {
        require_once(Config::get('path_views') . '/admin_category/create.php');
        return true;
    }

    public function actionUpdate()
    {
        require_once(Config::get('path_views') . '/admin_category/update.php');
        return true;
    }

    public function actionDelete()
    {
        require_once(Config::get('path_views') . '/admin_category/delete.php');
        return true;
    }
}
