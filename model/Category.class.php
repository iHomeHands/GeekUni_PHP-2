<?php

class Category extends Model
{
    protected static $table = 'categories';

    protected static function setProperties()
    {
        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['parent_id'] = [
            'type' => 'int',
        ];
    }

    public static function getCategories($parentId = 0)
    {
        return db::getInstance()->Select(
            'SELECT id, name FROM '.self::$table.' WHERE status=:status AND parent_id = :parent_id',
            ['status' => 1, 'parent_id' => $parentId]
        );
    }

    public static function getCategoriesList()
    {
        return db::getInstance()->Select(
            'SELECT id, name FROM '.self::$table.' WHERE status = "1" ORDER BY name ASC',
            []
        );
    }

    public static function getCategoriesListAdmin()
    {
        return db::getInstance()->Select(
            'SELECT id, name, status FROM '.self::$table,
            []
        );
    }

    public static function getCategoryById($id)
    {
        return db::getInstance()->Select(
            'SELECT * FROM '.self::$table. ' WHERE id = :id',
            ['id'=>$id]
        )[0];
    }

    public static function createCategory($name, $sortOrder, $status)
    {
        return db::getInstance()->Query(
            'INSERT INTO '.self::$table.' (name, status, parent_id ) '
                . 'VALUES (:name, :status, :parent_id)',
            ['name' => $name, 'status' => $status, 'parent_id' => 0]
        );
    }

    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        return db::getInstance()->Query(
            'UPDATE '.self::$table. ' SET name = :name,'.
                'status = :status WHERE id = :id',
            ['id'=>$id, 'name' => $name, 'status' => $status ]
        );
    }

    public static function deleteCategoryById($id)
    {
        return db::getInstance()->Query(
            'DELETE FROM '.self::$table.' WHERE id = :id',
            ['id' => $id]
        );
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }
}
