<?php

require "model/HTMLElements.php";

/**
 * the contact controller
 */
class ContactController {

    /**
     * shows the contact form
     *
     * @return void
     */
    public function home() {
      include "view/contactFormulier.php";
    }

}
