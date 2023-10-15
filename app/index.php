<?php
spl_autoload_register(
    function ($class){

        require_once($class.".php");
    }
);

/**
 * leads the correct controller to manage different pages
 */
class App{
    function __construct(){
        if(isset($_GET)){
            if(isset($_GET['resource'])){
                $resource = $_GET['resource'];
                $controllerClass = "\\controllers\\".ucfirst($resource)."Controller";
                if(class_exists($controllerClass)){
                    $controller = new $controllerClass();

                }
            }
        }
    }
}

$app = new App();
?>