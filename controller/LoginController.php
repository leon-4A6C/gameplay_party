<?php
require "model/UserModel.php";

class LoginController {

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function home() {

        include "view/login.php";

    }

    public function loggingIn() {
        echo "<pre>";
        var_dump($_REQUEST);

        var_dump($this->userModel->checkPassword($_REQUEST["username"], $_REQUEST["password"]));
    }

}