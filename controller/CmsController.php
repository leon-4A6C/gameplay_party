<?php

require "model/CMSModel.php";
require "model/AuthModel.php";

/**
 * the cms controller
 */
class CmsController {

    /**
     * the cms model
     *
     * @var CMSModel
     */
    public $cmsModel;

    /**
     * the authModel
     *
     * @var authModel
     */
    public $authModel;

    /**
     * the constructor
     */
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

    /**
     * shows the edit cms page view
     *
     * @param string $pagePath path of the page of the cms
     * @return void
     */
    function edit($pagePath = null) {
        $this->authModel->auth(["admin", "redacteur"]);

        if(!$pagePath)
            return $this->authModel->redirect("/");

        $page = $this->cmsModel->read($pagePath);
        if(!$page)
            return $this->authModel->redirect("/");

        
        include "view/cmsEdit.php";

    }

    /**
     * processes the page edit form
     *
     * @param string $pagePath path of the page of the cms
     * @return void
     */
    public function save($pagePath = null) {
        $this->authModel->auth(["admin", "redacteur"]);

        if(!$pagePath)
            return $this->authModel->redirect("/");

        $this->cmsModel->update($pagePath, $_REQUEST["content"]);

        return $this->authModel->redirect("/cms/$pagePath");
    }

}