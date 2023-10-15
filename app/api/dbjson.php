<?php

namespace api;

class DbJson{

    private $house;
    private $project;
    private $admin;

    function __construct(){
        $this->house = new \models\House();
    }

    function getJson($dataNeeded){
        if ($dataNeeded == 'housesfull') { 
            header("Content-Type: application/json");
            return json_encode($this->house->getAll());
        } 
        // else if ($dataNeeded == 'projectsfull') { 
        //     header("Content-Type: application/json");
        //     return json_encode($this->project->getAll());
        // } else if ($dataNeeded == 'clientscompany') { 
        //     header("Content-Type: application/json");
        //     return json_encode($this->client->getClientCompany());
        // }else if ($dataNeeded == 'projectsclient') {
        //     header("Content-Type: application/json");
        //     return json_encode($this->project->getProjectClient());
        // }else if ($dataNeeded == 'adminsfull') {
        //     header("Content-Type: application/json");
        //     return json_encode($this->admin->getAll());
        // }
    }
}
?>