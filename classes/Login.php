<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 14.12.2017
 * Time: 11:47
 */

class Login
{

    public static function string2hash($string = null)
    {
        if(!empty($string))
        {
            return hash('sha512', $string);
        }
    }

}