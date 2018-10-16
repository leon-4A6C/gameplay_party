<?php

require_once "DataHandler.php";

/**
 * Tijden model class
 */
class TijdenModel {

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
     * read Tijden
     *
     * @param int $tijden
     * @return array the query data
     */
    public function read($zaal_id, $tijd_id = null) {
        if($tijd_id)
            return $this->dataHandler->readData(
                "SELECT * FROM `tijden` WHERE zaal_id = :zaal_id AND tijd_id = :tijd_id",
                [
                    ":zaal_id" => $zaal_id,
                    ":tijd_id" => $tijd_id,
                ]
            );

        return $this->dataHandler->readData(
            "SELECT * FROM `tijden` WHERE zaal_id = :zaal_id",
            [
                ":zaal_id" => $zaal_id,
            ]
        );
    }

    public function create($zaal_id, $begindatum, $einddatum) {
        return $this->dataHandler->createData(
            "INSERT INTO `tijden`(`zaal_id`, `begindatum`, `einddatum`) VALUES (:zaal_id, :begindatum, :einddatum)",
            [
                ":zaal_id" => $zaal_id,
                ":begindatum" => $begindatum,
                ":einddatum" => $einddatum
            ]
        );
    }

}