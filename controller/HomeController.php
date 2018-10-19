<?php

require "model/BiosModel.php";

/**
 * home controller
 */
class HomeController {

    /**
     * the bios model
     *
     * @var BiosModel
     */
    public $biosModel;

    /**
     * the constructor
     */
    public function __construct() {
        $this->biosModel = new BiosModel();
    }

    /**
     * the default page
     *
     * @return void
     */
    public function home() {
        $bioscopen = $this->biosModel->selectHome();

        foreach ($bioscopen as $key => $bioscoop) {
            $bioscopen[$key]["bios_beschrijving"] = substr($bioscopen[$key]["bios_beschrijving"], 0, strpos($bioscopen[$key]["bios_beschrijving"], ".")) . ".";
        }

        include "view/homepagina.php";
    }

}
