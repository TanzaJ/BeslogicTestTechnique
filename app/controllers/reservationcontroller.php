<?php
namespace controllers;
require(dirname(__DIR__).'/models/reservation.php');
require(dirname(__DIR__).'/api/dbjson.php');

class ReservationController extends BaseController{
<<<<<<< Updated upstream
    private $housepage;
=======
    private $reservation;
>>>>>>> Stashed changes
    private $house;
    private $dbjson;

    function __construct(){

        if(isset($_GET)){
            if(isset($_GET['action'])){
<<<<<<< Updated upstream
                $this->housepage = new \models\Housepage();
=======
                $this->reservation = new \models\Reservation();
>>>>>>> Stashed changes
                $this->dbjson = new \api\DbJson();
                $this->house = new \models\House();

                $action = $_GET['action'];
                if($action == 'view'){
<<<<<<< Updated upstream
                    $viewClass = "\\views\\"."housepage".ucfirst($action);
                
                    if(class_exists($viewClass)){
                        $view = new $viewClass($this->housepage);
=======
                    $viewClass = "\\views\\"."reservationpage".ucfirst($action);
                
                    if(class_exists($viewClass)){
                        $view = new $viewClass($this->reservation);
>>>>>>> Stashed changes
                    }
                }
                else if ($action == 'getdata') {
                    if(isset($_GET['data'])){
<<<<<<< Updated upstream
                        if(isset($_GET['dataId'])){
                            $dataNeeded = $_GET['data'];
                            $id = $_GET['dataId'];
                            echo $this->dbjson->getJsonWithId($dataNeeded, $id);
                        }
=======
                        $dataNeeded = $_GET['data'];
                        echo $this->dbjson->getJson($dataNeeded);

>>>>>>> Stashed changes
                    }
                }
                else if ($action == 'delete') {
                    if(isset($_GET['dataId'])){
                        $id = $_GET['dataId'];
<<<<<<< Updated upstream
                        $this->house->reserveHouse(isset($_GET['price']), $id, 1);
=======
                        $this->reservation->deleteReservation($id);
>>>>>>> Stashed changes
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