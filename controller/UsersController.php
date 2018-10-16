<?php

require "model/UserModel.php";
require "model/AuthModel.php";
require_once "model/RoleModel.php";

class UsersController {

    public function __construct() {
        $this->authModel = new AuthModel();
        $this->roleModel = new RoleModel();
        $this->userModel = new UserModel();

        $this->authModel->auth(["admin", "redacteur"]);
    }

    public function home() {
        $this->authModel->redirect("/users/create");
    }

    public function create() {
        $roles = $this->roleModel->read();

        include "view/createUser.php";
    }

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