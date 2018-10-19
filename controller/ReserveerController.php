<?php

require "model/BiosModel.php";
require "model/TijdenModel.php";
require "model/ZalenModel.php";
require "model/ReserveringModel.php";
require "model/KlantenModel.php";

/**
 * the reserveer controller
 */
class ReserveerController {

    /**
     * the bios model
     *
     * @var BiosModel
     */
    public $biosModel;

    /**
     * the tijden model
     *
     * @var TijdenModel
     */
    public $tijdenModel;

    /**
     * the reservering model
     *
     * @var ReserveringModel
     */
    public $reserveringModel;

    /**
     * the klanten model
     *
     * @var KlantenModel
     */
    public $klantenModel;

    /**
     * the zalen model
     *
     * @var ZalenModel
     */
    public $zalenModel;

    /**
     * the constructor
     */
    public function __construct() {
        $this->biosModel = new BiosModel();
        $this->tijdenModel = new TijdenModel();
        $this->reserveringModel = new ReserveringModel();
        $this->klantenModel = new KlantenModel();
        $this->zalenModel = new ZalenModel();
    }

    /**
     * bios reservering form
     *
     * @param int $bios_id the bios you want
     * @return void
     */
    public function bios($bios_id) {

        $bios = $this->biosModel->read($bios_id);

        $zalen = $this->zalenModel->read($bios_id);

        foreach ($zalen as $key => $zaal) {
            $zalen[$key]["tijden"] = $this->tijdenModel->readAvailableTimes($zaal["zaal_id"]);
        }
        
        include "view/reserverenFormulier.php";

    }

    /**
     * processes the reserveer form
     *
     * @return void
     */
    public function reserveer() {

        $klant_id = $this->klantenModel->create(
            $_REQUEST["klant_geslacht"] == "m",
            $_REQUEST["klant_voorletter"],
            $_REQUEST["klant_achternaam"],
            $_REQUEST["straatnaam"],
            $_REQUEST["huisnummer"],
            $_REQUEST["toevoeging"] ?? "",
            $_REQUEST["postcode"],
            $_REQUEST["woonplaats"],
            $_REQUEST["provincie"],
            $_REQUEST["telefoonnummer"],
            $_REQUEST["email"]
        );

        $tijd = $this->tijdenModel->read(null, $_REQUEST["tijd_id"]);

        $reserveringsnummer = $this->reserveringModel->create(
            $tijd["tijd_id"],
            $klant_id,
            $tijd["zaal_id"]
        );

        include "view/reservering_success.php";

    }

}
