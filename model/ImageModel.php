<?php

require_once "DataHandler.php";
require_once "UploadHandler.php";

/**
 * Image class
 * 
 * CRUD for the Image table
 */
class ImageModel {

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
        $this->fileHandler = new UploadHandler(APP_DIR . "/view/assets/images/bioscopen");
    }

    /**
     * reads images
     *
     * @param string $id the id of the image
     * @return array the image
     */
    public function read($id = null) {
        if($id)
            return $this->dataHandler->readData("SELECT * FROM `afbeeldingen` WHERE `afbeelding_id` = :afbeelding_id", [":afbeelding_id" => $id], false);

        return $this->dataHandler->readData("SELECT * FROM `afbeeldingen`");
    }

    /**
     * adds an image to the db
     *
     * @param string $path the path of the image
     * @param string $bios_id the bios id
     * @return bool
     */
    public function createImage($path, $bios_id) {
        return $this->dataHandler->createData("INSERT INTO `afbeeldingen`(`afbeelding_path`, `bios_id`) VALUES (:path, :bios_id)", [":path" => $path, ":bios_id" => $bios_id]);
    }

    /**
     * adds images to the db
     *
     * @param array $paths the paths of the images
     * @param string $bios_id the bios id
     * @return bool
     */
    public function createImages($paths, $bios_id) {
        if(sizeof($paths) === 0)
            return false;
        
        $bindings = [
            ":bios_id" => $bios_id
        ];
        foreach ($paths as $key => $value) {
            $bindings[":path_".$key] = $value;
            $paths[$key] = "(:path_$key, :bios_id)";
        }
        $sql = "INSERT INTO `afbeeldingen`(`afbeelding_path`, `bios_id`) VALUES " . implode(", ", $paths);
        return $this->dataHandler->createData(
            $sql,
            $bindings
        );
    }

}