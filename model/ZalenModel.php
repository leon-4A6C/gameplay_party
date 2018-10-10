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

    public function create($zaalnummer, $bioscopen_id, $aantal_stoelen, $rolstoelplaatsen, $schermgrootte, $faciliteiten, $versies) {
        return $this->dataHandler->createData(
            "INSERT INTO `zalen`(`zaalnummer`, `bioscopen_id`, `aantal_stoelen`, `rolstoelplaatsen`, `schermgrootte`, `faciliteiten`, `versies`) VALUES (:zaalnummer, :bioscopen_id, :aantal_stoelen, :rolstoelplaatsen, :schermgrootte, :faciliteiten, :versies)",
            [
                ":zaalnummer" => $zaalnummer,
                ":bioscopen_id" => $bioscopen_id,
                ":aantal_stoelen" => $aantal_stoelen,
                ":rolstoelplaatsen" => $rolstoelplaatsen,
                ":schermgrootte" => $schermgrootte,
                ":faciliteiten" => $faciliteiten,
                ":versies" => $versies
            ]
        );
    }

}