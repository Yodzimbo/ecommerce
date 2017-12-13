<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 13.12.2017
 * Time: 22:10
 */

class Country extends Application
{

    public function getCountries() {
        $sql = "SELECT * FROM `countries`
				ORDER BY `name` ASC";
        return $this->db->fetchAll($sql);
    }

}