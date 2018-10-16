<?php

require "model/HTMLElements.php";
require "model/BiosModel.php";
require "model/AuthModel.php";
require "model/ImageModel.php";
require "model/TariefModel.php";
require "model/ZalenModel.php";
require "model/BereikbaarheidModel.php";

class BiosController {

    public $biosModel;

    public function __construct() {
        $this->biosModel = new BiosModel();
        $this->authModel = new AuthModel();

        $this->imageModel = new ImageModel();
        $this->uploadHandler = new UploadHandler(APP_DIR . "/view/assets/images/bioscopen");

        $this->tariefModel = new TariefModel();
        $this->zalenModel = new ZalenModel();
        $this->bereikbaarheidModel = new BereikbaarheidModel();
    }

    public function home($id = null) {
        if(!$id)
            return $this->overzicht();
        
        $this->detail($id);
    }

    public function overzicht() {

        $bioscopen = $this->biosModel->read();

        include "view/biosOverview.php";
    }

    public function detail($id = 1) {
        $bios = $this->biosModel->read($id);

        $this->authModel->redirect("https://kinepolis.nl/bioscopen/". str_replace(" ", "-", strtolower($bios["bios_naam"])) ."/info");
    }

    public function create() {
        $this->authModel->auth(["admin", "bioscoop"]);
        include "view/createBios.php";
    }

    public function add() {
        $this->authModel->auth(["admin", "bioscoop"]);

        if(!isset($_REQUEST["submit"]))
            $this->authModel->redirect("/bios/create");

        $bios_id = $this->biosModel->create(
            $_REQUEST["bioscoop_naam"],
            $_REQUEST["straatnaam"],
            $_REQUEST["huisnummer"],
            $_REQUEST["toevoeging"],
            $_REQUEST["postcode"],
            $_REQUEST["woonplaats"],
            $_REQUEST["provincie"],
            $_REQUEST["rolstoeltoegankelijkheid"],
            $_REQUEST["voorwaarden"],
            $_REQUEST["beschrijving"]
        );

        $paths = $this->uploadHandler->uploadImages($_FILES["images"]);

        $paths = array_map(function($x) {
            return $x["file_name"];
        }, $paths);

        $this->imageModel->createImages($paths, $bios_id);

        foreach($_REQUEST["tarieven"] as $tarief) {
            $this->tariefModel->create(
                $bios_id,
                $tarief["prijs"],
                $tarief["naam"],
                isset($tarief["toelag"])
            );
        }

        foreach ($_REQUEST["zalen"] as $zaal) {
            $this->zalenModel->create(
                $zaal["zaalnummer"],
                $bios_id,
                $zaal["stoelen"],
                $zaal["rolstoelplaatsen"],
                $zaal["schermgrootte"],
                $zaal["faciliteiten"],
                $zaal["versies"]
            );
        }

        foreach ($_REQUEST["bereikbaarheid"] as $key => $bereikbaarheid) {
            $this->bereikbaarheidModel->create(
                $bios_id,
                $key,
                $bereikbaarheid
            );
        }

    }

}
