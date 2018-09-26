<?php

require "model/TemplatingSystem.php";
require "model/HTMLElements.php";

class HomeController {

    public function __construct() {
        
    }

    public function home() {
        include "view/homepagina.php";
    }

}
