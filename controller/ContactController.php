<?php

require "model/HTMLElements.php";

class ContactController {

    public function __construct() {


    }

    public function home()
    {
      include "view/contactFormulier.php";
    }


}
