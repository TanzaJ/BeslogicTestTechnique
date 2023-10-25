<?php
namespace models;
// connects db to the model
require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");

/**
<<<<<<< Updated upstream
 * Class to use and manage houses
=======
 * Class to use and manage reservations
 * TODO: SQL Injection Prevention
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
    function getAll($userId){
        $query = "SELECT r.check_in, r.final_cost, h.name, h.img_url FROM reservation as r LEFT JOIN house as h ON h.house_id = r.house_id WHERE r.user_id = $userId";
=======
    function getAll(){
        $query = "SELECT r.reservation_id, r.check_in, r.final_cost, h.name, h.img_url FROM reservation as r LEFT JOIN house as h ON h.house_id = r.house_id";
>>>>>>> Stashed changes

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }
<<<<<<< Updated upstream
=======

    function deleteReservation($reservation_id){
        $query = "DELETE FROM reservation WHERE reservation_id = $reservation_id";

        $statement = $this->dbConnection->prepare($query);

        return $statement->execute();
    }
>>>>>>> Stashed changes
}
?>