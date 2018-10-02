<?php

require "DataHandler.php";

/**
 * Zalen model class
 */
class ZalenModel {

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
     * read zalen
     *
     * @param int $biosId
     * @param int $zaalnummer
     * @return array the query data
     */
    public function read($biosId, $zaalnummer = null) {

        if($zaalnummer)
            return $this->dataHandler->readData(
                "SELECT * FROM `openingstijden` WHERE bioscopen_id = :bioscopen_id AND `zaalnummer` = :zaalnummer",
                [":bioscopen_id" => $biosId, ":zaalnummer" => $zaalnummer]
            );

        return $this->dataHandler->readData(
            "SELECT * FROM `openingstijden` WHERE bioscopen_id = :bioscopen_id",
            [":bioscopen_id"]
        );
    }

}