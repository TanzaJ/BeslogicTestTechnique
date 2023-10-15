<?php
namespace controllers;
require(dirname(__DIR__).'/models/frontpage.php');
require(dirname(__DIR__).'/api/dbjson.php');

class FrontpageController{
    private $frontpage;
    private $dbjson;

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){

                $this->frontpage = new \models\FrontPage();
                $this->dbjson = new \api\DbJson();
                $action = $_GET['action'];
                if($action == 'view'){
                    $viewClass = "\\views\\"."Frontpage".ucfirst($action);
                
                    if(class_exists($viewClass)){
                        $view = new $viewClass($this->frontpage);
                    }
                }
                else if ($action == 'getdata') {
                    if(isset($_GET['data'])){
                        $dataNeeded = $_GET['data'];
                        echo $this->dbjson->getJson($dataNeeded);
                    }
                }
                
            }
            else { 
                echo "no action";
            }
        }
    }
}
?>