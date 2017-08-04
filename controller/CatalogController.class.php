<?php

class CatalogController
{
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $latestProducts = Good::getLatestProducts(12);

        require_once(Config::get('path_views') . '/catalog/index.php');
        return true ;
    }
}
