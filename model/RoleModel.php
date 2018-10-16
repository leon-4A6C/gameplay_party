<?php

require_once "DataHandler.php";

/**
 * RoleModel class
 * 
 * CRUD for the roles table
 */
class RoleModel {

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
     * reads all or specified roles
     *
     * @param integer $id the id you want, this is optional
     * @return array the query result
     */
    public function read(int $id = null) {

        if(!$id) {
            return $this->dataHandler->readData("SELECT * FROM `roles`");
        } else {
            return $this->dataHandler->readData("SELECT * FROM `roles` WHERE `role_id` = :id", [":id" => $id], false);
        }
    }

}