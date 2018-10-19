<?php

require_once "DataHandler.php";

/**
 * UserModel class
 */
class UserModel {

    /**
     * the logged in user
     *
     * @var array
     */
    public $user;

    /**
     * if the user is logged in
     *
     * @var boolean
     */
    public $isLoggedIn = false;

    /**
     * the dataHandler
     *
     * @var DataHandler
     */
    public $dataHandler;

    public function __construct() {
        $this->dataHandler = new DataHandler("localhost", DB_DATABASE, DB_USERNAME, DB_PASSWORD);

        $this->sessionLogin();
    }

    /**
     * reads a user
     *
     * @param string $username the user you want to read
     * @return array the user data
     */
    public function read(string $username) {
        return $this->dataHandler->readData(
            "SELECT * FROM `users` WHERE `username` = :username",
            [":username" => $username],
            false
        );
    }
    
    /**
     * generates a BCRYPT password
     *
     * @param string $password the password you want to encrypt
     * @return string password hash
     */
    public function generatePassword(string $password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * check if the filled in password from a user is correct
     *
     * @param string $username the username
     * @param string $password the password
     * @return bool
     */
    public function checkPassword(string $username, string $password) {

        $user = $this->read($username);

        if($user)
            return password_verify($password, $user["password"]);
        else
            return false;

    }

    /**
     * logges in from session
     *
     * @return bool
     */
    public function sessionLogin() {
        if(isset($_SESSION["user"])) {
            // logges in the user, also updates the user info if changed
            $this->user = $this->read($_SESSION["user"]["username"]);

            $_SESSION["user"] = $this->user;
            $this->isLoggedIn = true;
            return true;
        }

        return false;
    }

    /**
     * logges the user in
     *
     * @param string $username the users username
     * @param string $password the users password
     * @return bool
     */
    public function login(string $username, string $password) {
        if($this->checkPassword($username, $password)) {
            $this->user = $this->read($username);

            $_SESSION["user"] = $this->user;
            $this->isLoggedIn = true;

            return true;
        }

        return false;
    }

    /**
     * creates a user
     *
     * @param string $username the username
     * @param string $password the password
     * @param int $role_id the role id
     * @return int the user id
     */
    public function create($username, $password, $role_id) {
        return $this->dataHandler->createData(
            "INSERT INTO `users`(`username`, `password`, `role_id`) VALUES (:username, :password, :role_id)",
            [
                ":username" => $username,
                ":password" => $this->generatePassword($password),
                ":role_id" => $role_id
            ]
        );
    }

}