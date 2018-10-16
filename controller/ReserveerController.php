<?php

require "model/BiosModel.php";
require "model/TijdenModel.php";
require "model/ZalenModel.php";

class ReserveerController {

    public $biosModel;

    public function __construct() {
        $this->biosModel = new BiosModel();
        $this->tijdenModel = new TijdenModel();
        $this->zalenModel = new ZalenModel();
    }

    public function bios($bios_id) {

        $bios = $this->biosModel->read($bios_id);

        $zalen = $this->zalenModel->read($bios_id);

        foreach ($zalen as $key => $zaal) {
            $zalen[$key]["tijden"] = $this->tijdenModel->read($zaal["zaal_id"]);
        }
        
        include "view/reserverenFormulier.php";

    }

}
