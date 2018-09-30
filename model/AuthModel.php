<?php

require_once "UserModel.php";
require_once "RoleModel.php";

class AuthModel {

    public function __construct() {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
    }

    public function auth(array $roles) {
        if(!$this->userModel->isLoggedIn || !$this->checkUserRole($roles))
            return $this->redirect("/login");
    }

    public function checkUserRole(array $roles) {
        $userRole = $this->roleModel->read(
            $this->userModel->user["role_id"]
        )["name"];

        var_dump($userRole);

        return in_array($userRole, $roles);
    }

    public function redirect(string $url) {
        return header("Location: $url");
    }

}