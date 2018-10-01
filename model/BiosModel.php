<?php

require_once "DataHandler.php";

/**
 * BiosModel class
 */
class BiosModel {

    /**
     * the dataHandler
     *
     * @var DataHandler
     */
    public $dataHandler;

    /**
     * the constructor
     */
    public function __construct() {
        $this->dataHandler = new DataHandler("localhost", DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    }

    /**
     * reads a bioscoop
     *
     * @param string $id the id of the bios you want
     * @return array the query data
     */
    public function read($id = null) {
        if($id)
            return $this->dataHandler->readData("SELECT * FROM `bioscopen` WHERE `id` = :id", [":id" => $id], false);
        
        return $this->dataHandler->readData("SELECT * FROM `bioscopen`");
    }

}