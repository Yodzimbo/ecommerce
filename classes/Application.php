<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 05.12.2017
 * Time: 17:44
 */

class Application
{

    public $db;

    public function __construct()
    {

        $this->db = new Dbase();

    }

}