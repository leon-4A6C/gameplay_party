<?php

require_once "DataHandler.php";

/**
 * klant model class
 */
class KlantModel {

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
     * read klant
     *
     * @param int $klant
     * @return array the query data
     */
    public function read($klant_id) {
        return $this->dataHandler->readData(
            "SELECT * FROM `klanten` WHERE klant_id = :klant_id",
            [
                ":klant_id" => $klant_id,
            ]
        );
    }

    /**
     * create klant
     *
     * @param string $klant_geslacht
     * @param string $klant_voorletter
     * @param string $klant_achternaam
     * @param string $klant_straatnaam
     * @param int $klant_huisnummer
     * @param string $klant_toevoeging
     * @param string $klant_postcode
     * @param string $klant_woonplaats
     * @param string $klant_provincie
     * @param string $klant_telefoonnummer
     * @return int $klant_id
     */
    public function create(
        $klant_geslacht,
        $klant_voorletter,
        $klant_achternaam,
        $klant_straatnaam,
        $klant_huisnummer,
        $klant_toevoeging,
        $klant_postcode,
        $klant_woonplaats,
        $klant_provincie,
        $klant_telefoonnummer
    ) {
        return $this->dataHandler->createData(
            "INSERT INTO `klanten`(`klant_geslacht`, `klant_voorletter`, `klant_achternaam`, `klant_straatnaam`, `klant_huisnummer`, `klant_toevoeging`, `klant_postcode`, `klant_woonplaats`, `klant_provincie`, `klant_telefoonnummer`) VALUES (:klant_geslacht, :klant_voorletter, :klant_achternaam, :klant_straatnaam, :klant_huisnummer, :klant_toevoeging, :klant_postcode, :klant_woonplaats, :klant_provincie, :klant_telefoonnummer)",
            [
                ":klant_geslacht" => $klant_geslacht,
                ":klant_voorletter" => $klant_voorletter,
                ":klant_achternaam" => $klant_achternaam,
                ":klant_straatnaam" => $klant_straatnaam,
                ":klant_huisnummer" => $klant_huisnummer,
                ":klant_toevoeging" => $klant_toevoeging,
                ":klant_postcode" => $klant_postcode,
                ":klant_woonplaats" => $klant_woonplaats,
                ":klant_provincie" => $klant_provincie,
                ":klant_telefoonnummer" => $klant_telefoonnummer
            ]
        );
    }

}