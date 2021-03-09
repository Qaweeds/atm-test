<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 29.10.2015
 * Time: 0:57
 */

namespace LibraryController;

interface FrontControllerInterface
{
    public function setController($controller);
    public function setAction($action);
    public function setParams(array $params);
    public function run();
}