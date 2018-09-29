<?php

require_once "DataHandler.php";

class UserModel {

    public function __construct() {
        $this->dataHandler = new DataHandler("localhost", DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    }

    public function generatePassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function checkPassword($username, $password) {

        $user = $this->dataHandler->readData(
            "SELECT `password` FROM `users` WHERE `username` = :username",
            [":username" => $username],
            false
        );

        if($user)
            return password_verify($password, $user["password"]);
        else
            return false;
            
    }

}