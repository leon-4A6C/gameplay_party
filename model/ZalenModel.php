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
     * @param int $bios_id
     * @param int $zaalnummer
     * @return array the query data
     */
    public function read($bios_id, $zaal_id = null) {

        if($zaal_id)
            return $this->dataHandler->readData(
                "SELECT * FROM `zalen` WHERE bios_id = :bios_id AND `zaal_id` = :zaal_id",
                [":bios_id" => $bios_id, ":zaal_id" => $zaal_id],
                false
            );

        return $this->dataHandler->readData(
            "SELECT * FROM `zalen` WHERE bios_id = :bios_id",
            [":bios_id" => $bios_id]
        );
    }

    /**
     * creates a zaal
     *
     * @param int $zaalnummer the zaal number
     * @param int $bios_id the bios id
     * @param int $aantal_stoelen the amount of chairs
     * @param int $rolstoelplaatsen the amount of chairs
     * @param string $schermgrootte the size of the screen
     * @param string $faciliteiten the facilities
     * @param string $versies the versies
     * @return int zaal id
     */
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