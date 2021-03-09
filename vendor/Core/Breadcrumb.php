<?php
/**
 *
 */
class Breadcrumb
{
    protected static $menuOption = 'dashboard';

    public static function setMenuOption($menu)
    {
        self::$menuOption = $menu;
    }

    public static function isActiveMenu($menu = 'dashboard')
    {
        return self::$menuOption == $menu;
    }
}
