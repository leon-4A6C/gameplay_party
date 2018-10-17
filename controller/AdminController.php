<?php

require "model/UserModel.php";
require "model/AuthModel.php";

class AdminController {

    public function __construct() {
        $this->authModel = new AuthModel();

        $this->authModel->auth();
    }

    public function home() {
        $this->dashboard();
    }

    public function dashboard() {
        include "view/dashboard.php";
    }

}