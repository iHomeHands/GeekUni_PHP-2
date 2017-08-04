<?php

class App
{

    /**
     * Свойство для хранения массива роутов
     * @var array
     */
    private $routes=[];

    public function Init()
    {
        session_start();
        date_default_timezone_set('Europe/Moscow');
        db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));

        /*if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) {
            self::web(($_SERVER['QUERY_STRING']==='') ? $_SERVER['REQUEST_URI']: '');
        }*/
        $this->routes = include(Config::get('path_root'). '/config/routes.php');
        if (php_sapi_name() !== 'cli') {
            $this->run();
        }
    }

    /**
     * Возвращает строку запроса
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Метод для обработки запроса
     */
    public function run()
    {
        // Получаем строку запроса
        $uri = $this->getURI();
        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~{$uriPattern}~", $path, $uri);
                // Определить контроллер, action, параметры

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                // Подключить файл класса-контроллера
                $controllerFile = Config::get('path_root') . '/controllers/' .
                    $controllerName . '.php';

                //if (file_exists($controllerFile)) {
                //    include_once($controllerFile);
                //}

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;
                if (method_exists($controllerObject, $actionName)) {
                    /* Вызываем необходимый метод ($actionName) у определенного
                     * класса ($controllerObject) с заданными ($parameters) параметрами
                     */
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                } else {
                    // ToDo: 404
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                }

                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    break;
                }
            }
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
                //require_once (Config::get('path_libs') . '/smarty/Autoloader.php');
                //Smarty_Autoloader::register();
                $smarty = new Smarty();

                $smarty->setTemplateDir(Config::get('path_templates'));
                $smarty->assign('title', $controller->title);
                $smarty->assign('data', $data);
                $smarty->assign('categories', CategoriesController::getCategories(0));
                $smarty->display($view);
                //echo $smarty->fetch($view);
            } else {
                echo json_encode($data);
            }
        }
    }
}
