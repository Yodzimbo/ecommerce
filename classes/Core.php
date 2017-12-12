<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 05.12.2017
 * Time: 13:15
 */

class Core
{

    public function run()
    {
        ob_start();

        require_once(Url::getPage());

        ob_get_flush();
    }
}