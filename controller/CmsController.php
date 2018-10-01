<?php

require "model/CMSModel.php";
require "model/AuthModel.php";

class CmsController {

    public $cmsModel;
    public $authModel;

    public function __construct() {
        $this->cmsModel = new CMSModel();
        $this->authModel = new AuthModel();
    }

    /**
     * renders a page from the database
     *
     * @param string $func
     * @param array $params
     * @return void
     */
    function __call($func, $params){
        $page = $this->cmsModel->read($func);

        if(!$page)
            return $this->authModel->redirect("/");

        include "view/cmsView.php";
    }

    function edit($pagePath = null) {
        $this->authModel->auth(["admin", "redacteur"]);

        if(!$pagePath)
            return $this->authModel->redirect("/");

        $page = $this->cmsModel->read($pagePath);
        if(!$page)
            return $this->authModel->redirect("/");

        
        include "view/cmsEdit.php";

    }

    public function save($pagePath = null) {
        $this->authModel->auth(["admin", "redacteur"]);

        if(!$pagePath)
            return $this->authModel->redirect("/");

        $this->cmsModel->update($pagePath, $_REQUEST["content"]);

        return $this->authModel->redirect("/cms/$pagePath");
    }

}