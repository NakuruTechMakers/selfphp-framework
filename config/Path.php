<?php

namespace SelfPhp;

use AltoRouter;
use SelfPhp\Request;
use SelfPhp\SP;
use SelfPhp\Auth;

class Path extends AltoRouter
{
    public $controller;
    public $callable_function;

    public function __construct($controller = null, $callable_function = null)
    {

        ($this->is_session_active() == true) ? null : session_start();


        $this->controller = $controller;
        $this->callable_function = $callable_function;
    }

    /**
     * @return bool
     */
    public function is_session_active()
    {
        if (php_sapi_name() !== 'cli') {
            if (version_compare(phpversion(), '5.4.0', '>=')) {
                return session_status() === PHP_SESSION_ACTIVE ? true : false;
            } else {
                return session_id() === '' ? false : true;
            }
        }
        return false;
    }

    public static function route($controller, $callable_function)
    {
        $path = new Path();

        $sp = new SP();

        $sp->setup_config(); 

        $sp->request_config("Helper");

        $route = $path->controller_path($controller);
        
        if (isset($route)) {
            require $route;
        }
        else { 
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            exit();
        }
        
        $controller_class = new $controller();
        $controller_class->$callable_function((new Request()));
    }

    public function controller_path($controller)
    {
        $controllerPath = $GLOBALS['controllerPath'];

        $controller_found_array = array();

        foreach ($controllerPath as $controller_folder) {
            $controller_path = glob($controller_folder . DIRECTORY_SEPARATOR . $controller . '.php');

            if (count($controller_path) > 0) {
                array_push($controller_found_array, $controller_path);
            } 
        } 

        if (isset($controller_found_array[0][0]) && !empty($controller_found_array[0][0])) {
            return $controller_found_array[0][0];
        }  
        else if (isset($controller_found_array[1][0]) && !empty($controller_found_array[1][0])) {
            return $controller_found_array[1][0];
        } 
        else {
            return null;
        }
    }
}
