<?php

require_once "DataHandler.php";

/**
 * reservering model class
 */
class ReserveringModel {

    /**
     * data handler
     *
     * @var DataHandler
     */
    public $dataHandler;

    /**
     * constructor function
     */
    public function __construct() {
        $this->dataHandler = new DataHandler("localhost", DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    }

    /**
     * read reservering
     *
     * @param int $reservering
     * @return array the query data
     */
    public function read($reservering_id) {
        return $this->dataHandler->readData(
            "SELECT * FROM `reservering` WHERE reservering_id = :reservering_id",
            [
                ":reservering_id" => $reservering_id,
            ]
        );
    }

    public function create($reservering_tijd, $klant_id, $zaal_id) {
        return $this->dataHandler->createData(
            "INSERT INTO `reservering`(`reservering_tijd`, `klant_id`, `zaal_id`) VALUES (:reservering_tijd, :klant_id, :zaal_id)",
            [
                ":reservering_tijd" => $reservering_tijd,
                ":klant_id" => $klant_id,
                ":zaal_id" => $zaal_id
            ]
        );
    }

}