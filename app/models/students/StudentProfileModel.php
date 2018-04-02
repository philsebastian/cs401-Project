<?php

class StudentProfileModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('student account');
    }

    public function GetData()
    {
        $accountInfo = parent::GetMyStudentAccountInfo();
        return (array_merge(parent::GetData(), $accountInfo));
    }

}