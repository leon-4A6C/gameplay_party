<?php

require_once "DataHandler.php";

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
    public function read($biosId, $zaal_id = null) {

        if($zaal_id)
            return $this->dataHandler->readData(
                "SELECT * FROM `zalen` WHERE bios_id = :bios_id AND `zaal_id` = :zaal_id",
                [":bios_id" => $biosId, ":zaal_id" => $zaal_id]
            );

        return $this->dataHandler->readData(
            "SELECT * FROM `zalen` WHERE bios_id = :bios_id",
            [":bios_id"]
        );
    }

    public function create($zaalnummer, $bios_id, $aantal_stoelen, $rolstoelplaatsen, $schermgrootte, $faciliteiten, $versies) {
        return $this->dataHandler->createData(
            "INSERT INTO `zalen`(`zaalnummer`, `bios_id`, `aantal_stoelen`, `rolstoelplaatsen`, `schermgrootte`, `faciliteiten`, `versies`) VALUES (:zaalnummer, :bios_id, :aantal_stoelen, :rolstoelplaatsen, :schermgrootte, :faciliteiten, :versies)",
            [
                ":zaalnummer" => $zaalnummer,
                ":bios_id" => $bios_id,
                ":aantal_stoelen" => $aantal_stoelen,
                ":rolstoelplaatsen" => $rolstoelplaatsen,
                ":schermgrootte" => $schermgrootte,
                ":faciliteiten" => $faciliteiten,
                ":versies" => $versies
            ]
        );
    }

}