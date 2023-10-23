<?php
namespace controllers;
require(dirname(__DIR__).'/models/housepage.php');
require(dirname(__DIR__).'/api/dbjson.php');

class HousepageController extends BaseController{
    private $housepage;
    private $house;
    private $dbjson;

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
                $this->housepage = new \models\Housepage();
                $this->dbjson = new \api\DbJson();
                $this->house = new \models\House();

                $action = $_GET['action'];
                if($action == 'view'){
                    $viewClass = "\\views\\"."housepage".ucfirst($action);
                
                    if(class_exists($viewClass)){
                        $view = new $viewClass($this->housepage);
                    }
                }
                else if ($action == 'getdata') {
                    if(isset($_GET['data'])){
                        if(isset($_GET['dataId'])){
                            $dataNeeded = $_GET['data'];
                            $id = $_GET['dataId'];
                            echo $this->dbjson->getJsonWithId($dataNeeded, $id);
                        }
                    }
                }
                else if ($action == 'reserve') {
                    if(isset($_GET['dataId'])){
                        $id = $_GET['dataId'];
                        $this->house->reserveHouse(isset($_GET['price']), $id, 1);
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