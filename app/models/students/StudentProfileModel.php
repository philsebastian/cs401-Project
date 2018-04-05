<?php

class StudentProfileModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('student account');
    }

    public function GetData()
    {
        $data = parent::GetData();
        $content = array('contents' => ["students" . DS . "_profile"]);
        $accountInfo = parent::GetMyStudentAccountInfo();

        $data = array_merge($data, $content);
        $data = array_merge($data, $accountInfo);

        return $data;
    }
}