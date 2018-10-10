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
                "SELECT * FROM `tarieven` WHERE bioscopen_id = :bioscopen_id AND `id` => :id",
                [":bioscopen_id" => $biosId, ":id" => $id]
            );

        return $this->dataHandler->readData(
            "SELECT * FROM `tarieven` WHERE bioscopen_id = :bioscopen_id",
            [":bioscopen_id" => $biosId]
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
            "INSERT INTO `tarieven`(`bioscopen_id`, `prijs`, `naam`, `toeslag`) VALUES (:bioscopen_id, :prijs, :naam, :toeslag)",
            [
                ":bioscopen_id" => $biosId,
                ":prijs" => $prijs,
                ":naam" => $naam,
                ":toeslag" => $toeslag,
            ]
        );
    }

}