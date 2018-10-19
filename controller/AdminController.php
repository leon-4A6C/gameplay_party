<?php

require "model/UserModel.php";
require "model/AuthModel.php";

/**
 * the admin controller
 */
class AdminController {

    /**
     * the auth model
     *
     * @var Authmodel
     */
    public $authModel;

    /**
     * the contructor
     */
    public function __construct() {
        $this->authModel = new AuthModel();

        $this->authModel->auth();
    }

    /**
     * the default route
     *
     * @return void
     */
    public function home() {
        $this->dashboard();
    }

    /**
     * the admin dashboard
     *
     * @return void
     */
    public function dashboard() {
        include "view/dashboard.php";
    }

}