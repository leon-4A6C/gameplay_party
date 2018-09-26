<?php

require "model/TemplatingSystem.php";
require "model/HTMLElements.php";

class HomeController {

    public function __construct() {
        
    }

    public function home() {
        $content = new TemplatingSystem(__DIR__ . "/../view/content.tpl");
        $content->setTemplateData([
            "title" => "dinges",
            "dingesTable" => HTMLElements::table([
                "dinges" => "dinges"
            ], "table")
        ]);

        echo $content->parseTemplate();
    }

    public function dinges($param1 = "") {
        var_dump($param1);

        echo htmlspecialchars(".");
    }

}
