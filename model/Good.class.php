<?php

class Good extends Model
{
    protected static $table = 'goods';

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    protected static function setProperties()
    {
        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['price'] = [
            'type' => 'float'
        ];

        self::$properties['description'] = [
            'type' => 'text'
        ];

        self::$properties['category'] = [
            'type' => 'int'
        ];
    }

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        return db::getInstance()->Select(
            'SELECT id, name, price FROM ' .self::$table
            . ' WHERE status = "1" ORDER BY id DESC'
            . ' LIMIT '.(int)($count),
            []
        );
    }

    public static function getProductsList()
    {
        return db::getInstance()->Select(
            'SELECT id, name, price FROM '.self::$table.' ORDER BY id ASC',
            []
        );
    }

    public static function getProductById($id)
    {
        return db::getInstance()->Select(
            'SELECT * FROM '.self::$table. ' WHERE id = :id',
            ['id'=>$id]
        )[0];
    }

    public static function createProduct($options)
    {
        return db::getInstance()->Query(
            'INSERT INTO '.self::$table.' (name, price, category, '
                . 'description, status)'
                . 'VALUES '
                . '(:name, :price, :category_id, :description, :status)',
            ['name' => $options['name'], 'price'=>$options['price'],
             'category_id' => $options['category_id'],
             'description'=> $options['description'],
             'status' => $options['status']]
        );
    }

    public static function updateProductById($id, $options)
    {
        return db::getInstance()->Query(
            'UPDATE '.self::$table. ' SET name = :name, price = :price, category = :category_id,'.
                'description = :description, status = :status WHERE id = :id',
            ['name' => $options['name'], 'price'=>$options['price'],
             'category_id' => $options['category_id'],
             'description'=> $options['description'],
             'status' => $options['status'],'id'=>$id]
        );
    }

    public static function deleteProductById($id)
    {
        return db::getInstance()->Query(
            'DELETE FROM '.self::$table.' WHERE id = :id',
            ['id' => $id]
        );
    }

    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '3':
                return 'Архив';
                break;
            case '2':
                return 'Закончилось';
                break;
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/upload/images/products/';
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }
        return $path . $noImage;
    }
}
