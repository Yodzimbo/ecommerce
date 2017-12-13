<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 13.12.2017
 * Time: 14:16
 */

require_once '../inc/autoload.php';

if(isset($_POST['id']))
{
    $id = $_POST['id'];
    Session::removeItem($id);
}