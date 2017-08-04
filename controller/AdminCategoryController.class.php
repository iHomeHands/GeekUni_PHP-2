<?php

class AdminCategoryController
{
    public function actionIndex()
    {
        $categoriesList = Category::getCategoriesListAdmin();
        require_once(Config::get('path_views') . '/admin_category/index.php');
        return true;
    }

    public function actionCreate()
    {
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Category::createCategory($name, $sortOrder, $status);

                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }
        }

        require_once(Config::get('path_views') . '/admin_category/create.php');
        return true;
    }

    public function actionUpdate($id)
    {

        // Получаем данные о конкретной категории
        $category = Category::getCategoryById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Category::updateCategoryById($id, $name, $sortOrder, $status);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }
        require_once(Config::get('path_views') . '/admin_category/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Category::deleteCategoryById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");
        }
        require_once(Config::get('path_views') . '/admin_category/delete.php');
        return true;
    }
}
