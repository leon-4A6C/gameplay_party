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
            return $this->dataHandler->readData("SELECT * FROM `bioscopen` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bioscopen_id` = `bioscopen`.`id` GROUP BY `bioscopen`.`id` WHERE `id` = :id", [":id" => $id], false);
        
        return $this->dataHandler->readData("SELECT * FROM `bioscopen` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bioscopen_id` = `bioscopen`.`id` GROUP BY `bioscopen`.`id`");
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
    public function create($naam, $straatnaam, $huisnummer, $toevoeging, $postcode, $woonplaats, $provincie, $rolstoeltoegankelijkheid, $voorwaarden, $beschrijving) {
        return $this->dataHandler->createData(
            "INSERT INTO `bioscopen`(`bioscoop_naam`, `straatnaam`, `huisnummer`, `toevoeging`, `postcode`, `woonplaats`, `provincie`, `rolstoeltoegankelijkheid`, `voorwaarden`, `beschrijving`, `users_id`) VALUES (:naam, :straatnaam, :huisnummer, :toevoeging, :postcode, :woonplaats, :provincie, :rolstoeltoegankelijkheid, :voorwaarden, :beschrijving, :user_id)",
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
                ":user_id" => 2
            ]
        );
    }

    public function selectHome() {
        return $this->dataHandler->readData(
            "(SELECT MIN(`zalen`.`aantal_stoelen`) as `aantal_stoelen`, `bioscopen`.`id`, `bioscopen`.`bioscoop_naam`, `bioscopen`.`beschrijving`, `afbeeldingen`.`path` FROM `zalen` INNER JOIN `bioscopen` ON `zalen`.`bioscopen_id` = `bioscopen`.`id` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bioscopen_id` = `bioscopen`.`id` LIMIT 1)

            UNION ALL
            
            (SELECT MAX(`zalen`.`aantal_stoelen`) as `aantal_stoelen`, `bioscopen`.`id`, `bioscopen`.`bioscoop_naam`, `bioscopen`.`beschrijving`, `afbeeldingen`.`path` FROM `zalen` INNER JOIN `bioscopen` ON `zalen`.`bioscopen_id` = `bioscopen`.`id` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bioscopen_id` = `bioscopen`.`id` LIMIT 1)
            
            UNION ALL
            
            (SELECT AVG(`zalen`.`aantal_stoelen`) as `aantal_stoelen`, `bioscopen`.`id`, `bioscopen`.`bioscoop_naam`, `bioscopen`.`beschrijving`, `afbeeldingen`.`path` FROM `zalen` INNER JOIN `bioscopen` ON `zalen`.`bioscopen_id` = `bioscopen`.`id` LEFT JOIN `afbeeldingen` ON `afbeeldingen`.`bioscopen_id` = `bioscopen`.`id` LIMIT 1)"
        );
    }

}