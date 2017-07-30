<?php

class App
{
    public static function Init()
    {
        date_default_timezone_set('Europe/Moscow');
        db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            self::web(($_SERVER['QUERY_STRING']==='') ? $_SERVER['REQUEST_URI']: '' );
        }
    }

    public static function api($url)
    {
        $_REQUEST['asAjax'] = $_GET['asAjax'] = true;
        $_REQUEST['fromApi'] = true;
        self::web($url);
    }


    protected static function web($url)
    {
        $originalUrl = $url;
        $url = explode('/', $url);
        if (isset($url[1])) {
            if ($url[1] == 'api') {
                self::api(str_replace('/api', '', $originalUrl));
                exit;
            }
            $_GET['page'] = ($url[1]===''?'index':$url[1]);
            if (isset($url[2])) {
                if (is_numeric($url[2])) {
                    $_GET['id'] = $url[2];
                } else {
                    $_GET['action'] = $url[2];
                }
                if (isset($url[3])) {
                    $_GET['id'] = $url[3];
                }
            }
        }
        if (isset($_GET['page'])) {
            $controllerName = $_GET['page'] . 'Controller';
            $methodName = isset($_GET['action']) ? $_GET['action'] : 'index';
            $controller = new $controllerName();
            $data = $controller->$methodName($_REQUEST);

            $view = $controller->view . '/' . $methodName . '.html';
            if (!isset($_GET['asAjax'])) {
                require_once (Config::get('path_libs') . '/smarty/Autoloader.php');
                Smarty_Autoloader::register();
                $smarty = new Smarty();
                $smarty->setTemplateDir(Config::get('path_templates'));
                $smarty->assign('title', $controller->title);
                $smarty->assign('data', $data);
                $smarty->assign('categories', CategoriesController::getCategories(0));
                echo $smarty->fetch($view);
            } else {
                echo json_encode($data);
            }
        }
    }


}