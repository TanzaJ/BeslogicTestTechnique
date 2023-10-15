<?php
namespace controllers;

require(dirname(__DIR__)."/models/house.php");


class HouseController extends BaseController{
    function __construct(){
        if(isset($_GET)){
            /**
             * process actions requested by 
             */
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                $house = new \models\House();

                if ($action == 'savedata') {
                    if(!empty($_POST['client_id']) && !empty($_POST['service_type_id']) && !empty($_POST['status_id']) 
                    && !empty($_POST['house_description']) && !empty($_POST['order_date']) 
                    && !empty($_POST['budget']) && !empty($_POST['deadline'])){
                        $house->sethouseId($_POST['id']);
                        $house->setClient_id($_POST['client_id']);
                        $house->setServiceTypeId($_POST['service_type_id']);
                        $house->setStatusId($_POST['status_id']);
                        $house->sethouseDescription($_POST['house_description']);
                        $house->setOrderDate($_POST['order_date']);
                        $house->setBudget($_POST['budget']);
                        $house->setDeadline($_POST['deadline']);
                        $house->updatehouse();                      
                    } else{
                        $this->debug_to_console("whoops no data");
                    }
                }
                else if ($action == 'deletedata'){
                    $this->debug_to_console("pjp");
                    $house->sethouseId($_POST['id']);
                    $house->deletehouse();
                }
                else if ($action == 'createdata'){
                    if(!empty($_POST['client_id']) && !empty($_POST['service_type_id']) && !empty($_POST['status_id']) 
                    && !empty($_POST['house_description']) && !empty($_POST['order_date']) 
                    && !empty($_POST['budget']) && !empty($_POST['deadline'])){

                        $house->setClient_id($_POST['client_id']);
                        $house->setServiceTypeId($_POST['service_type_id']);
                        $house->setStatusId($_POST['status_id']);
                        $house->sethouseDescription($_POST['house_description']);
                        $house->setOrderDate($_POST['order_date']);
                        $house->setBudget($_POST['budget']);
                        $house->setDeadline($_POST['deadline']);

                        $house->createhouse();
                        
                    } else{
                        $this->debug_to_console("whoops no data");
                    }
                }
            }
        }
    }
}


?>