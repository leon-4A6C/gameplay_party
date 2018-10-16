<?php

require_once "UserModel.php";
require_once "RoleModel.php";

/**
 * AuthModel class
 * 
 * Handles the authorisation, checks is user can visit page
 */
class AuthModel {

    /**
     * userRole
     *
     * @var array the logged in users role
     */
    public $userRole;

    /**
     * user model
     *
     * @var UserModel
     */
    public $userModel;

    /**
     * role model
     *
     * @var RoleModel
     */
    public $roleModel;

    /**
     * constructor
     */
    public function __construct() {
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();

        $this->userRole = $this->getUserRole();
    }

    /**
     * gets the logged in users role
     *
     * @return array the query result
     */
    public function getUserRole() {
        return $this->roleModel->read(
            $this->userModel->user["role_id"]
        );
    }

    /**
     * checks if the user can visit the page
     *
     * @param array $roles the roles that can visit the page in text
     * @return void
     */
    public function auth(array $roles = null) {
        if(!$this->userModel->isLoggedIn || !$this->checkUserRole($roles))
            return $this->redirect("/login?redirect=". urlencode($_SERVER["REQUEST_URI"]));
    }

    /**
     * checks if the user role has the correct authorisation level
     *
     * @param array $roles the roles that can visit the page in text
     * @return bool
     */
    public function checkUserRole(array $roles = null) {

        if($roles)
            return in_array($this->userRole["role_name"], $roles);

        // if no roles specified all roles are okay
        return true;
    }

    /**
     * redirects the page
     *
     * @param string $url the url to redirect to
     * @return void
     */
    public function redirect(string $url) {
        return header("Location: $url");
    }

}