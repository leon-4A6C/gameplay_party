<?php

require "model/HTMLElements.php";
require "model/BiosModel.php";
require "model/AuthModel.php";
require "model/ImageModel.php";
require "model/TariefModel.php";
require "model/ZalenModel.php";
require_once "model/UserModel.php";
require "model/TijdenModel.php";
require "model/BereikbaarheidModel.php";

/**
 * the controller for the bios
 */
class BiosController {

    /**
     * the bios model
     *
     * @var BiosModel
     */
    public $biosModel;

    /**
     * the auth model
     *
     * @var AuthModel
     */
    public $authModel;

    /**
     * the user model
     *
     * @var UserModel
     */
    public $userModel;

    /**
     * the tijden model
     *
     * @var TijdenModel
     */
    public $tijdenModel;

    /**
     * the upload handler
     *
     * @var UploadHandler
     */
    public $uploadHandler;

    /**
     * the tariefModel
     *
     * @var TariefModel
     */
    public $tariefModel;

    /**
     * the zalen model
     *
     * @var ZalenModel
     */
    public $zalenModel;

    /**
     * the bereikbaarheid model
     *
     * @var BereikbaarheidModel
     */
    public $bereikbaarheidModel;

    /**
     * constructor
     */
    public function __construct() {
        $this->biosModel = new BiosModel();
        $this->authModel = new AuthModel();
        $this->userModel = new UserModel();

        $this->tijdenModel = new TijdenModel();

        $this->imageModel = new ImageModel();
        $this->uploadHandler = new UploadHandler(APP_DIR . "/view/assets/images/bioscopen");

        $this->tariefModel = new TariefModel();
        $this->zalenModel = new ZalenModel();
        $this->bereikbaarheidModel = new BereikbaarheidModel();
    }

    /**
     * the home is the default
     *
     * @param int $id bios id
     * @return void
     */
    public function home($id = null) {
        if(!$id)
            return $this->overzicht();
        
        $this->detail($id);
    }

    /**
     * shows the bios overview
     *
     * @return void
     */
    public function overzicht() {

        $bioscopen = $this->biosModel->read();

        foreach ($bioscopen as $key => $bioscoop) {
            $bioscopen[$key]["bios_beschrijving"] = substr($bioscopen[$key]["bios_beschrijving"], 0, strpos($bioscopen[$key]["bios_beschrijving"], ".")) . ".";
        }

        include "view/biosOverview.php";
    }

    /**
     * bios detail page
     *
     * @param integer $id bios id
     * @return void
     */
    public function detail($id = 1) {
        $bios = $this->biosModel->read($id);

        $this->authModel->redirect("https://kinepolis.nl/bioscopen/". str_replace(" ", "-", strtolower($bios["bios_naam"])) ."/info");
    }

    /**
     * bios add form
     *
     * @return void
     */
    public function create() {
        $this->authModel->auth(["admin", "bioscoop"]);

        include "view/createBios.php";
    }

    /**
     * processes the bios add form
     *
     * @return void
     */
    public function add() {
        $this->authModel->auth(["admin", "bioscoop"]);

        if(!isset($_REQUEST["submit"]))
            $this->authModel->redirect("/bios/create");

        $user_id = $this->authModel->userModel->user["user_id"];
        if(isset($_REQUEST["bios_username"])) {
            $user = $this->userModel->read($_REQUEST["bios_username"]);
            if($user) {
                $user_id = $user["user_id"];
            }
        }

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
            $_REQUEST["beschrijving"],
            $user_id
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

    /**
     * shows bios time form
     *
     * @return void
     */
    public function tijden() {
        $this->authModel->auth(["bioscoop"]);

        $this->authModel->auth(["bioscoop"]);

        $user = $this->authModel->userModel->user;

        $bios = $this->biosModel->readFromUser($user["user_id"]);

        if(!$bios)
            $this->authModel->redirect("/bios/create");

        $zalen = $this->zalenModel->read($bios["bios_id"]);

        include "view/biosTijden.php";
    }

    /**
     * processes the bios time form
     *
     * @return void
     */
    public function tijdenAdd() {
        $this->authModel->auth(["bioscoop"]);

        foreach ($_REQUEST["tijden"] as $tijd) {
            $this->tijdenModel->create(
                $_REQUEST["zaal_id"],
                $tijd["begintijd"],
                $tijd["eindtijd"]
            );
        }

        $this->authModel->redirect("/bios/tijden?success");
    }

}
