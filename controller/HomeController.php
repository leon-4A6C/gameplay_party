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
            $bioscopen[$key]["beschrijving"] = substr($bioscopen[$key]["beschrijving"], 0, strpos($bioscopen[$key]["beschrijving"], ".")) . ".";
        }

        include "view/homepagina.php";
    }

}
