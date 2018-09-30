<?php

require_once "DataHandler.php";

/**
 * CMS class
 * 
 * CRUD for the cms table
 */
class CMSModel {

    /**
     * the dataHandler
     *
     * @var DataHandler
     */
    public $dataHandler;

    /**
     * the constructor
     */
    public function __construct() {
        $this->dataHandler = new DataHandler("localhost", DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    }

    /**
     * reads a page
     *
     * @param string $path the path of the page you want
     * @return array the page content
     */
    public function read($path) {
        return $this->dataHandler->readData("SELECT * FROM `cms` WHERE `path` = :path", [":path" => $path], false);
    }

    public function update($path, $content) {
        return $this->dataHandler->UpdateData(
            "UPDATE `cms` SET `content` = :content WHERE `path` = :path",
            [
                ":content" => $content,
                ":path" => $path
            ]
        );
    }

}