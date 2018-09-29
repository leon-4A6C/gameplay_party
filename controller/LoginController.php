<?php
require "model/UserModel.php";
require "model/AuthModel.php";

class LoginController {

    public function __construct() {
        $this->userModel = new UserModel();
        $this->authModel = new AuthModel();
    }

    public function home() {

        include "view/login.php";

    }

    public function loggingIn() {
        $this->userModel->login($_REQUEST["username"], $_REQUEST["password"]);

        // go somewhere
        $this->authModel->redirect("securePage");
    }

    // example
    public function securePage() {

        $auth_level = ["admin"];

        $this->authModel->auth($auth_level);

        echo "test, je moet ingelogd zijn! als:<br/>";
        print_r($auth_level);
    }

}