<?php

class Order extends Model
{
    protected static $table = 'orders';

    protected static function setProperties()
    {
        self::$properties['phone'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['address'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['email'] = [
            'type' => 'float'
        ];

        self::$properties['user_session'] = [
            'type' => 'varchar',
            'size' => 64
        ];
    }

    public static function getOrdersList()
    {
        return db::getInstance()->Select(
            'SELECT id, email, phone FROM '.self::$table.' ORDER BY id ASC',
            []
        );
    }

    public static function getOrderById($id)
    {
        return db::getInstance()->Select(
            'SELECT * FROM '.self::$table. ' WHERE id = :id',
            ['id'=>$id]
        )[0];
    }
}
