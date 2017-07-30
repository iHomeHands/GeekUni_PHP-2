<?php
class CategoriesController extends Controller
{

    public $view = 'categories';

    public $title = 'categories';

    public function index($data)
    {
        if (isset($data['fromApi'])) {
            return ['categories' => db::getInstance()->Select('SELECT name, id FROM categories WHERE status=:status', ['status' => Status::Active])];
        }
        $categories = self::getCategories(isset($data['id']) ? $data['id'] : 0);
        $goods = self::getGoods(isset($data['id']) ? $data['id'] : 0);
        return ['subcategories' => $categories, 'goods' => $goods];
    }

    public static function getCategories($parentId = 0)
    {
        return db::getInstance()->Select(
            'SELECT id, name FROM categories WHERE status=:status AND parent_id = :parent_id',
            ['status' => Status::Active, 'parent_id' => $parentId]);

    }

    protected function getGoods($categoryId)
    {
        return db::getInstance()->Select(
            'SELECT id, name, price FROM goods WHERE category = :category AND status=:status',
            ['status' => Status::Active, 'category' => $categoryId]);
    }
}
?>