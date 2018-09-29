<?php

require_once "DataHandler.php";

class UserModel {

    public $user;
    public $isLoggedIn = false;

    public function __construct() {
        $this->dataHandler = new DataHandler("localhost", DB_DATABASE, DB_USERNAME, DB_PASSWORD);

        $this->loginFromSession();
    }

    public function generatePassword(string $password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function checkPassword(string $username, string $password) {

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

    public function loginFromSession() {
        if(isset($_SESSION["user"])) {
            $this->user = $_SESSION["user"];
            $this->isLoggedIn = true;

            return true;
        }

        return false;
    }

    public function login(string $username, string $password) {
        if($this->checkPassword($username, $password)) {
            $this->user = $this->dataHandler->readData(
                "SELECT * FROM `users` WHERE `username` = :username",
                [":username" => $username],
                false
            );

            $_SESSION["user"] = $this->user;
            $this->isLoggedIn = true;

            return true;
        }

        return false;
    }

}