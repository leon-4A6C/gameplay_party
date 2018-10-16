<?php

require_once "DataHandler.php";

/**
 * Tarief model class
 */
class TariefModel {

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
     * read tarief
     *
     * @param int $biosId
     * @param int $id
     * @return array the query data
     */
    public function read($biosId, $id = null) {
        if($id)
            return $this->dataHandler->readData(
                "SELECT * FROM `tarieven` WHERE bios_id = :bios_id AND `tarief_id` => :id",
                [":bios_id" => $biosId, ":id" => $id]
            );

        return $this->dataHandler->readData(
            "SELECT * FROM `tarieven` WHERE bios_id = :bios_id",
            [":bios_id" => $biosId]
        );
    }

    /**
     * create tarief
     *
     * @param int $biosId
     * @param string $prijs
     * @param string $naam
     * @param string $toeslag
     * @return int insert id
     */
    public function create($biosId, $prijs, $naam, $toeslag) {
        return $this->dataHandler->createData(
            "INSERT INTO `tarieven`(`bios_id`, `prijs`, `naam`, `toeslag`) VALUES (:bios_id, :prijs, :naam, :toeslag)",
            [
                ":bios_id" => $biosId,
                ":prijs" => $prijs,
                ":naam" => $naam,
                ":toeslag" => $toeslag,
            ]
        );
    }

}