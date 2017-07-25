<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{

	public function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'admin';
		$action_name = 'index';
		//$routes = explode('/', $_SERVER['REQUEST_URI']);
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $routes = explode('/', $uri['path']);

        if(isset($_GET['module'])) {
            $module = trim($_GET['module']);
        }
		// получаем имя контроллера
        if(!empty($module)) {
            $controller_name = $module;
        } elseif(!empty($routes[1])) {
            $controller_name = $routes[1];
        }



		// добавляем префиксы
        $this->loader($controller_name,$action_name);
		// подцепляем файл с классом модели (файла модели может и не быть)

	}

	public static function loader($class,$action_name = 'index',$no_action = true){


            $model_name = 'Model_'.$class;
            $controller_name = 'Controller_'.$class;
            $action_name = 'action_'.$action_name;

            $model_file = strtolower($model_name).'.php';
            $model_load = strtolower($model_name);
            $model_path = "application/models/".$model_file;


            if(file_exists($model_path)) {

                include "application/models/".$model_file;
                $model = new $model_load();
            }

            // подцепляем файл с классом контроллера
            $controller_file = strtolower($controller_name).'.php';
            $controller_path = "application/controllers/".$controller_file;


            if(file_exists($controller_path)) {
                include "application/controllers/".$controller_file;
                $controller = new $controller_name();
            }
            else {
                Route::ErrorPage404();
            }
            // создаем контроллер
            $action = $action_name;

            if($no_action) {
                if (method_exists($controller, $action)) {
                    // вызываем действие контроллера
                    $controller->$action();
                } else {
                    // здесь также разумнее было бы кинуть исключение
                    Route::ErrorPage404();
                }
            }
            if($model) {
                return $model;
            }


    }

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}