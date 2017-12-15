<?php
/**
 * Created by PhpStorm.
 * User: Narbe
 * Date: 15.12.2017
 * Time: 22:21
 */

require_once 'PHPMailer/src/PHPMailer.php';

class Email
{

    private $objMailer;

    public function __construct()
    {
        $this->objMailer = new PHPMailer();
        $this->objMailer->IsSMTP();
        $this->objMailer->SMTPAuth = true;
        $this->objMailer->SMTPKeepAlive = true;
        $this->objMailer->Host = "smtp.gmail.com";
        $this->objMailer->Port = 25;
        $this->objMailer->Username = "gumis@gmail.com";
        $this->objMailer->Password = "password!";
        $this->objMailer->SetFrom("gumis@gmail.com", "Patryk aka Narbe");
        $this->objMailer->AddReplayTo("gumis@gmail.com", "Patryk aka Narbe");
    }

    public function process($case = null, $array = null)
    {
        if(!empty($case))
        {
            switch ($case)
            {
                case 1:
//                    add url to the array
                    $link = "<a href=\"".SITE_URL."/?page=activate&code=";
                    $link .= $array['hash'];
                    $link .= "\">";
                    $link .= SITE_URL."/?page=activate&code=";
                    $link .= $array['hash'];
                    $link .= "</a>";
                    $array['link'] = $link;

                    $this->objMailer->Subject = "Aktywuj swoje konto";

                    $this->objMailer->MsgHTML($this->fetchEmail($case, $array));
                    $this->objMailer->AddAddress($array['email'],$array['first_name'].' '.$array['last_name']);

                    break;
            }

//            send email
            if($this->objMailer->Send())
            {
                $this->objMailer->ClearAddresses();
                return true;
            }
            return false;
        }

    }

}