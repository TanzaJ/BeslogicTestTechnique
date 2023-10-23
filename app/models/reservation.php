<?php
namespace models;
// connects db to the model
require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");

/**
 * Class to use and manage houses
 */
class Reservation{
    private $reservation_id;
    private $check_in;
    private $final_cost;
    private $house_id;
    private $user_id;


    private $dbConnection;

    function __construct(){
        $conManager = new \database\DBConnectionManager();

        $this->dbConnection = $conManager->getConnection();
    }

    function getAll($userId){
        $query = "SELECT r.check_in, r.final_cost, h.name, h.img_url FROM reservation as r LEFT JOIN house as h ON h.house_id = r.house_id WHERE r.user_id = $userId";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }
}
?>