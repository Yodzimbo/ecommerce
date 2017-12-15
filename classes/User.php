<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 15.12.2017
 * Time: 12:40
 */

class User extends Application
{

    private $_table = "clients";
    public $_id;

    public function isUser($email, $password)
    {
        $password = Login::string2hash($password);
        $sql = "SELECT * FROM {$this->_table} WHERE email = '".$this->db->escape($email)."' AND password = '".$this->db->escape($password)."' AND active = 1";
        $result = $this->db->fetchOne($sql);
        if(!empty($result))
        {
            $this->_id = $result['id'];
            return true;
        }
        return false;
    }

    public function addUser($params = null, $password = null)
    {
        if(!empty($params) && !empty($password))
        {
            $this->db->prepareInsert($params);
            if($this->db->insert($this->_table))
            {
//                send email
                $objEmail = new Email();
                if($objEmail->process(1, array(
                    'email'         => $params['email'],
                    'first_name'    => $params['first_name'],
                    'last_name'     => $params['last_name'],
                    'password'      => $password,
                    'hash'          => $params['hash']
                ))){
                    return true;
                }
                return false;
            }
            return false;
        }
        return false;
    }
}