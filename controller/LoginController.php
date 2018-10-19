<?php
require "model/UserModel.php";
require "model/AuthModel.php";

/**
 * the login controller
 */
class LoginController {

    /**
     * the user model
     *
     * @var UserModel
     */
    public $userModel;

    /**
     * the auth model
     *
     * @var AuthModel
     */
    public $authModel;

    /**
     * the constructor
     */
    public function __construct() {
        $this->userModel = new UserModel();
        $this->authModel = new AuthModel();
    }

    /**
     * the default page
     *
     * @return void
     */
    public function home() {

        include "view/login.php";

    }

    /**
     * processes the login form
     * redirects you to the correct page
     *
     * @return void
     */
    public function loggingIn() {
        $this->userModel->login($_REQUEST["username"], $_REQUEST["password"]);

        if(!$this->userModel->isLoggedIn)
            return $this->authModel->redirect("/login?error" . (isset($_GET["redirect"]) ? ("&redirect=".urlencode($_GET["redirect"])) : ""));

        // if redirected to login page go back
        if(isset($_GET["redirect"]))
            return $this->authModel->redirect($_GET["redirect"]);
        
        //goto dashboard
        $this->authModel->redirect("/admin");
    }

    /**
     * a test login page
     *
     * @return void
     */
    public function securePage() {

        $auth_level = ["admin"];

        $this->authModel->auth($auth_level);

        echo "test, je moet ingelogd zijn! als:<br/>";
        print_r($auth_level);
    }

}