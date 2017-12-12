<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 05.12.2017
 * Time: 17:46
 */

class Business extends Application
{

    private $_table = 'business';

    public function getBusiness()
    {

        $sql = "SELECT * FROM `{$this->_table}` WHERE `id` = 1";
        return $this->db->fetchOne($sql);

    }

    public function getVatRate()
    {

        $business = $this->getBusiness();
        return $business['vat_rate'];

    }

}