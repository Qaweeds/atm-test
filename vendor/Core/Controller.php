<?php
/**
 *
 */
abstract class Controller
{
    protected static $menuOption = 'dashboard';

    protected $db;

    public function  __construct()
    {
        $this->db = new DataBase();

        Breadcrumb::setMenuOption(static::$menuOption);
    }
}
