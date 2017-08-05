<?php

class User extends Model
{
    protected static $table = 'users';

    protected static function setProperties()
    {
        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 64
        ];

        self::$properties['email'] = [
            'type' => 'varchar',
            'size' => 128
        ];

        self::$properties['password'] = [
            'type' => 'varchar',
            'size' => 128
        ];
    }

    public static function getUsers()
    {
        return db::getInstance()->Select(
            'SELECT id, name, email FROM '.self::$table,
            []
        );
    }

    public static function getUserById($id)
    {
        return db::getInstance()->Select(
            'SELECT * FROM '.self::$table. ' WHERE id = :id',
            ['id'=>$id]
        )[0];
    }

    public static function checkUserData($email, $password)
    {
        $user =db::getInstance()->Select(
            'SELECT * FROM '.self::$table
            . ' WHERE email = :email AND password = :password',
            ['email'=>$email, 'password'=> $password]
        );
        if (count($user)>0) {
            return $user[0]['id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function createUser($name, $email, $password)
    {
        return db::getInstance()->Query(
            'INSERT INTO '.self::$table.' (name, email, password ) '
                . 'VALUES (:name, :email, :password)',
            ['name' => $name, 'email' => $email, 'password' => $password]
        );
    }

    public static function updateUserById($id, $name, $email, $password)
    {
        return db::getInstance()->Query(
            'UPDATE '.self::$table. ' SET name = :name, '
                .'email = :email, password = :password WHERE id = :id',
            ['name' => $name, 'password' => $password, 'email' => $email,'id'=>$id]
        );
    }

    public static function deleteUserById($id)
    {
        return db::getInstance()->Query(
            'DELETE FROM '.self::$table.' WHERE id = :id',
            ['id' => $id]
        );
    }
}
