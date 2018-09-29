<?php

require_once "DataHandler.php";

class RoleModel {

    public function __construct() {
        $this->dataHandler = new DataHandler("localhost", DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    }

    public function read(int $id = null) {

        if(!isset($id)) {
            return $this->dataHandler->readData("SELECT * FROM `roles`");
        } else {
            return $this->dataHandler->readData("SELECT * FROM `roles` WHERE `id` = :id", [":id" => $id], false);
        }
    }

}