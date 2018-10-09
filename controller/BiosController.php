<?php

require "model/HTMLElements.php";
require "model/BiosModel.php";

class BiosController {

    public $biosModel;

    public function __construct() {
        $this->biosModel = new BiosModel();
    }

    public function home($id = null) {
        if(!$id)
            return $this->overzicht();
        
        $this->detail($id);
    }

    public function overzicht() {

        $data = $this->biosModel->read();

        foreach ($data as $key => $value) {
            $data[$key]["id"] = "<a href=\"/bios/detail/".$value["id"]."\">". $value["id"] ."</a>";
        }

        $table = HTMLElements::table(
            $data,
            "table"
        );

        include "view/tableView.php";
    }

    public function detail($id) {
        $table = HTMLElements::table(
            $this->biosModel->read($id),
            "table"
        );

        include "view/tableView.php";
    }

    public function create() {
        include "view/createBios.php";
    }

}
