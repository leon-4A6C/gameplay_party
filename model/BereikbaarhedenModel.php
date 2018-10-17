<?php

require_once "DataHandler.php";

/**
 * Bereikbaarheden model class
 */
class BereikbaarhedenModel {

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
     * read bereikbaarheden
     *
     * @param int $biosId
     * @return array the query data
     */
    public function read($biosId) {
        return $this->dataHandler->readData(
            "SELECT * FROM `bereikbaarheden` WHERE bioscopen_id = :bioscopen_id",
            [":bioscopen_id" => $biosId]
        );
    }

    public function create($bioscopen_id, $naam, $content) {
        return $this->dataHandler->createData(
            "INSERT INTO `bereikbaarheden`(`bioscopen_id`, `naam`, `content`) VALUES (:bioscopen_id, :naam, :content)",
            [
                ":bioscopen_id" => $bioscopen_id,
                ":naam" => $naam,
                ":content" => $content
            ]
        );
    }

}