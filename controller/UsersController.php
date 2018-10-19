<?php

require "model/UserModel.php";
require "model/AuthModel.php";
require_once "model/RoleModel.php";

/**
 * user controller
 */
class UsersController {

    /**
     * the constructor
     */
    public function __construct() {
        $this->authModel = new AuthModel();
        $this->roleModel = new RoleModel();
        $this->userModel = new UserModel();

        $this->authModel->auth(["admin", "redacteur"]);
    }

    /**
     * the default page
     *
     * @return void
     */
    public function home() {
        $this->authModel->redirect("/users/create");
    }

    /**
     * create user form
     *
     * @return void
     */
    public function create() {
        $roles = $this->roleModel->read();

        include "view/createUser.php";
    }

    /**
     * processes the create user form
     *
     * @return void
     */
    public function add() {
        if(!isset($_REQUEST["submit"]))
            $this->authModel->redirect("create");

        $user = $this->userModel->read($_REQUEST["username"]);
        if($user)
            $this->authModel->redirect("create?error=username");

        $user_id = $this->userModel->create(
            $_REQUEST["username"],
            $_REQUEST["password"],
            $_REQUEST["role_id"]
        );

        $this->authModel->redirect("create?success");
    }

}