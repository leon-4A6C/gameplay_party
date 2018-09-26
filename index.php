<?php

define("APP_DIR", __DIR__);
define("DEV", true);
define("DEV_DIR", "/mvc_router");

require "model/Router.php";

$router = new Router();