<?php

require "DataHandler.php";

/**
 * Openingstijden model class
 */
class OpeningstijdenModel {

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
     * read openingstijd
     *
     * @param int $biosId
     * @return array the query data
     */
    public function read($biosId) {
        return $this->dataHandler->readData(
            "SELECT * FROM `openingstijden` WHERE bioscopen_id = :bioscopen_id",
            [":bioscopen_id" => $biosId]
        );
    }

}