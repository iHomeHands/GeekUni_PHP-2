<?php

class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once(Config::get('path_views') . '/cabinet/index.php');
        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $email = $user['email'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
            /*
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            */

            if ($errors == false) {
                $result = User::updateUserById($userId, $name, $email, $password);
            }
        }

        require_once(Config::get('path_views') . '/cabinet/edit.php');
        return true;
    }
}
