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
        $tabcontent = array("tabs" => ["profile" => "account", "Payment Account" => "account/paymentinfo", "payment history" => "account/payments", "my teacher" => "account/myteacher"]);
        $accountInfo = parent::GetMyStudentAccountInfo();

        $data = array_merge($data, $content);
        $data = array_merge($data, $accountInfo);
        $data = array_merge($data, $tabcontent);

        return $data;
    }
}