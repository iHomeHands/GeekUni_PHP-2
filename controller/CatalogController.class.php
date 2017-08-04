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
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список товаров в категории
        $categoryProducts = Good::getProductsListByCategory($categoryId, $page);

        // Общее количетсво товаров (необходимо для постраничной навигации)
        $total = Good::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Good::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once(Config::get('path_views') . '/catalog/category.php');
        return true;
    }
}
