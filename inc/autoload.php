<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 05.12.2017
 * Time: 12:36
 */

require_once ('config.php');

function __autoload($class_name)
{

    $class = explode("_", $class_name);
    $path = implode("/", $class).".php";

    require_once($path);
}