<?php
namespace models;
// connects db to the model
require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");

/**
 * Class to use and manage houses
 */
class House{
    private $house_id;
    private $img_url;
    private $name;
    private $description;
    private $location;
    private $price;
    private $total_likes;
    private $guests_num;
    private $bedrooms_num;
    private $bathrooms_num;
    private $property_id;
    private $language_id ;

    private $dbConnection;

    function __construct(){
        $conManager = new \database\DBConnectionManager();

        $this->dbConnection = $conManager->getConnection();
    }

    function getAll(){
        $query = "SELECT h.house_id, h.img_url, h.name, h.description, h.location, h.price, h.total_likes, h.guests_num, h.bedrooms_num, h.bathrooms_num, p.name as property_name, l.name as language FROM house h LEFT JOIN property p on h.property_id = p.property_id LEFT JOIN language l on h.language_id = l.language_id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }    

	function getHouseById($id){
        $query = "SELECT h.house_id, h.img_url, h.name, h.description, h.location, h.price, h.total_likes, h.guests_num, h.bedrooms_num, h.bathrooms_num, p.name as property_name, l.name as language FROM house h LEFT JOIN property p on h.property_id = p.property_id LEFT JOIN language l on h.language_id = l.language_id WHERE 1 AND h.house_id = $id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
    }

	function getAllHouseAmenities($id){
		$query = "SELECT a.name FROM amenity as a LEFT JOIN amenitylist as al on a.amenity_id = al.amenity_id WHERE al.house_id = $id";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();

        return $statement->fetchAll();
	}

	function reserveHouse($final_cost, $house_id, $user_id){
		$query = "INSERT INTO reservation (check_in, final_cost, house_id, user_id) VALUES (curdate() , $final_cost,$house_id, $user_id)";

        $statement = $this->dbConnection->prepare($query);

        $statement->execute();
		
        return $statement->fetchAll();
	}

    /**
     * Variable getters and setters 
     */

	/**
	 * @return mixed
	 */
	public function getHouse_id() {
		return $this->house_id;
	}
	
	/**
	 * @param mixed $house_id 
	 * @return self
	 */
	public function setHouse_id($house_id): self {
		$this->house_id = $house_id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getImg_url() {
		return $this->img_url;
	}
	
	/**
	 * @param mixed $img_url 
	 * @return self
	 */
	public function setImg_url($img_url): self {
		$this->img_url = $img_url;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @param mixed $name 
	 * @return self
	 */
	public function setName($name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * @param mixed $description 
	 * @return self
	 */
	public function setDescription($description): self {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLocation() {
		return $this->location;
	}
	
	/**
	 * @param mixed $location 
	 * @return self
	 */
	public function setLocation($location): self {
		$this->location = $location;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPrice() {
		return $this->price;
	}
	
	/**
	 * @param mixed $price 
	 * @return self
	 */
	public function setPrice($price): self {
		$this->price = $price;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTotal_likes() {
		return $this->total_likes;
	}
	
	/**
	 * @param mixed $total_likes 
	 * @return self
	 */
	public function setTotal_likes($total_likes): self {
		$this->total_likes = $total_likes;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getGuests_num() {
		return $this->guests_num;
	}
	
	/**
	 * @param mixed $guests_num 
	 * @return self
	 */
	public function setGuests_num($guests_num): self {
		$this->guests_num = $guests_num;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getBedrooms_num() {
		return $this->bedrooms_num;
	}
	
	/**
	 * @param mixed $bedrooms_num 
	 * @return self
	 */
	public function setBedrooms_num($bedrooms_num): self {
		$this->bedrooms_num = $bedrooms_num;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getBathrooms_num() {
		return $this->bathrooms_num;
	}
	
	/**
	 * @param mixed $bathrooms_num 
	 * @return self
	 */
	public function setBathrooms_num($bathrooms_num): self {
		$this->bathrooms_num = $bathrooms_num;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getProperty_id() {
		return $this->property_id;
	}
	
	/**
	 * @param mixed $property_id 
	 * @return self
	 */
	public function setProperty_id($property_id): self {
		$this->property_id = $property_id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLanguage_id() {
		return $this->language_id;
	}
	
	/**
	 * @param mixed $language_id 
	 * @return self
	 */
	public function setLanguage_id($language_id): self {
		$this->language_id = $language_id;
		return $this;
	}
}
?>