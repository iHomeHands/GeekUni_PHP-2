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

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = Category::getCategoriesList();

        $categoryProducts = Good::getProductsListByCategory($categoryId, $page);

        $total = Good::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Good::SHOW_BY_DEFAULT, 'page-');

        require_once(Config::get('path_views') . '/catalog/category.php');
        return true;
    }
}
