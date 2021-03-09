<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 30.10.2015
 * Time: 23:46
 */
define("BASE_DIR", __DIR__ . '/');

include_once BASE_DIR . 'vendor/bootstrap.php';
include_once BASE_DIR . '/vendor/Core/Breadcrumb.php';
include_once BASE_DIR . '/vendor/Core/Controller.php';

define('BASE_URL', 'http://' . Config::getConfig()['base_url']);
define('ASSETS_URL', BASE_URL . 'assets/');
