<?php

require_once "DataHandler.php";

/**
 * BereikbaarhedenModel model class
 */
class BereikbaarheidModel {

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
     * read Bereikbaarheid
     *
     * @param int $biosId
     * @return array the query data
     */
    public function read($biosId) {
        return $this->dataHandler->readData(
            "SELECT * FROM `bereikbaarheid` WHERE bios_id = :bios_id",
            [":bios_id" => $biosId]
        );
    }

    /**
     * creates a bereikbaarheid
     *
     * @param int $bios_id the bios id
     * @param string $naam the name of the bereikbaarheid
     * @param string $content the content of the bereikbaarheid
     * @return void
     */
    public function create($bios_id, $naam, $content) {
        return $this->dataHandler->createData(
            "INSERT INTO `bereikbaarheid`(`bios_id`, `bereikbaarheid_naam`, `bereikbaarheid_content`) VALUES (:bios_id, :naam, :content)",
            [
                ":bios_id" => $bios_id,
                ":naam" => $naam,
                ":content" => $content
            ]
        );
    }

}