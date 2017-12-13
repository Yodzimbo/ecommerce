<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 13.12.2017
 * Time: 13:36
 */

require_once '../inc/autoload.php';

if(isset($_POST['qty']) && isset($_POST['id']))
{

    $out = array();
    $id = $_POST['id'];
    $val = $_POST['qty'];

    $objCatalogue = new Catalogue();
    $product = $objCatalogue->getProduct(($id));

    if(!empty($product))
    {
        switch ($val)
        {
            case 0:
                Session::removeItem($id);
                break;
            default:
                Session::setItem($id, $val);
        }
    }
}