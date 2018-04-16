<?php

class StudentProfileModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('account');
    }

    public function GetData($content)
    {
        $data = parent::GetData($content);
        $tabcontent = array("tabs" => ["profile" => "account", "payment account" => "account/paymentinfo", "payment history" => "account/payments", "my teacher" => "account/myteacher"]);
        $data = array_merge($data, $tabcontent);

        return $data;
    }
}