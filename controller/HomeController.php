<?php

require "model/BiosModel.php";

class HomeController {

    public $biosModel;

    public function __construct() {
        $this->biosModel = new BiosModel();
    }

    public function home() {
        $bioscopen = $this->biosModel->selectHome();

        foreach ($bioscopen as $key => $bioscoop) {
            $bioscopen[$key]["bios_beschrijving"] = substr($bioscopen[$key]["bios_beschrijving"], 0, strpos($bioscopen[$key]["bios_beschrijving"], ".")) . ".";
        }

        include "view/homepagina.php";
    }

}
