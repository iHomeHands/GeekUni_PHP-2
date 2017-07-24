<?php

class App 
{
    public static function Init() 
    {
        date_default_timezone_set('Europe/Moscow');
        db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            self::web(isset($_GET['url']) ? $_GET['url'] : '');
        }
    }

    protected static function web($url)
    {
        if (isset($_GET['page'])) {
            $controllerName = $_GET['page'] . 'Controller';
            $methodName = isset($_GET['action']) ? $_GET['action'] : 'index';
            $controller = new $controllerName();
            $data = $controller->$methodName($_REQUEST);

            $view = $controller->view . '/' . $methodName . '.html';

            require_once (Config::get('path_libs') . '/smarty/Autoloader.php');
            Smarty_Autoloader::register();
            $smarty = new Smarty();
            $smarty->setTemplateDir(Config::get('path_templates'));
            $smarty->assign('title', $controller->title);
            $smarty->assign('data', $data);
            echo $smarty->fetch($view);
        }
    }


}