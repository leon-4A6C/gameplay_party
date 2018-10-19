<?php

require_once "DataHandler.php";

/**
 * BiosModel class
 */
class BiosModel {

    /**
     * the dataHandler
     *
     * @var DataHandler
     */
    public $dataHandler;

    /**
     * the constructor
     */
    public function __construct() {
        $this->dataHandler = new DataHandler("localhost", DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    }

    /**
     * reads a bioscoop
     *
     * @param string $id the id of the bios you want
     * @return array the query data
     */
    public function read($id = null) {
        if($id)
            return $this->dataHandler->readData("SELECT * FROM `bioscopen` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bios_id` = `bioscopen`.`bios_id` WHERE `bioscopen`.`bios_id` = :id GROUP BY `bioscopen`.`bios_id`", [":id" => $id], false);
        
        return $this->dataHandler->readData("SELECT * FROM `bioscopen` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bios_id` = `bioscopen`.`bios_id` GROUP BY `bioscopen`.`bios_id`");
    }

    /**
     * reads a bios from a user_id
     *
     * @param int $user_id
     * @return array the query data
     */
    public function readFromUser($user_id) {
        return $this->dataHandler->readData("SELECT * FROM `bioscopen` WHERE `user_id` = :user_id", [":user_id" => $user_id], false);
    }

    /**
     * creates a bioscoop
     *
     * @param string $naam
     * @param string $straatnaam
     * @param int $huisnummer
     * @param string $toevoeging
     * @param string $postcode
     * @param string $woonplaats
     * @param string $provincie
     * @param string $rolstoeltoegankelijkheid
     * @param string $voorwaarden
     * @param string $beschrijving
     * @return int insert id
     */
    public function create($naam, $straatnaam, $huisnummer, $toevoeging, $postcode, $woonplaats, $provincie, $rolstoeltoegankelijkheid, $voorwaarden, $beschrijving, $user_id) {
        return $this->dataHandler->createData(
            "INSERT INTO `bioscopen`(`bios_naam`, `bios_straatnaam`, `bios_huisnummer`, `bios_toevoeging`, `bios_postcode`, `bios_woonplaats`, `bios_provincie`, `bios_rolstoeltoegankelijkheid`, `bios_voorwaarden`, `bios_beschrijving`, `user_id`) VALUES (:naam, :straatnaam, :huisnummer, :toevoeging, :postcode, :woonplaats, :provincie, :rolstoeltoegankelijkheid, :voorwaarden, :beschrijving, :user_id)",
            [
                ":naam" => $naam,
                ":straatnaam" => $straatnaam,
                ":huisnummer" => $huisnummer,
                ":toevoeging" => $toevoeging,
                ":postcode" => $postcode,
                ":woonplaats" => $woonplaats,
                ":provincie" => $provincie,
                ":rolstoeltoegankelijkheid" => $rolstoeltoegankelijkheid,
                ":voorwaarden" => $voorwaarden,
                ":beschrijving" => $beschrijving,
                ":user_id" => $user_id
            ]
        );
    }

    /**
     * the select for the home page
     *
     * @return void
     */
    public function selectHome() {
        return $this->dataHandler->readData(
            "(SELECT MIN(`zalen`.`aantal_stoelen`) as `aantal_stoelen`, `bioscopen`.`bios_id`, `bioscopen`.`bios_naam`, `bioscopen`.`bios_beschrijving`, `afbeeldingen`.`afbeelding_path` FROM `zalen` INNER JOIN `bioscopen` ON `zalen`.`bios_id` = `bioscopen`.`bios_id` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bios_id` = `bioscopen`.`bios_id` LIMIT 1)

            UNION ALL
            
            (SELECT MAX(`zalen`.`aantal_stoelen`) as `aantal_stoelen`, `bioscopen`.`bios_id`, `bioscopen`.`bios_naam`, `bioscopen`.`bios_beschrijving`, `afbeeldingen`.`afbeelding_path` FROM `zalen` INNER JOIN `bioscopen` ON `zalen`.`bios_id` = `bioscopen`.`bios_id` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bios_id` = `bioscopen`.`bios_id` LIMIT 1)
            
            UNION ALL
            
            (SELECT AVG(`zalen`.`aantal_stoelen`) as `aantal_stoelen`, `bioscopen`.`bios_id`, `bioscopen`.`bios_naam`, `bioscopen`.`bios_beschrijving`, `afbeeldingen`.`afbeelding_path` FROM `zalen` INNER JOIN `bioscopen` ON `zalen`.`bios_id` = `bioscopen`.`bios_id` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bios_id` = `bioscopen`.`bios_id` LIMIT 1)"
        );
    }

}