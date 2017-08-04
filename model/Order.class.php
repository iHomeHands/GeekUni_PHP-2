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

    public static function createOrder($userName, $userPhone, $userComment, $userId, $products)
    {
        return db::getInstance()->Query(
            'INSERT INTO '.self::$table.' (email, phone ) '
                . 'VALUES (:email, :phone)',
            ['email' => $userName, 'phone' => $userPhone]
        );
    }

    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        return db::getInstance()->Query(
            'UPDATE '.self::$table.' SET '
            .'email = :email, '
            .'phone = :phone, '
            .'status = :status '
            .'WHERE id = :id',
            ['email' => $userName, 'phone' => $userPhone,'status'=>$status,'id'=> $id]
        );
    }

    public static function deleteOrderById($id)
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
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }
}
