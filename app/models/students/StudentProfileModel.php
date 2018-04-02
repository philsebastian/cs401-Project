<?php

class StudentProfileModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('student account');
    }

    public function GetData()
    {
        $session = new User();
        $accountInfo = $session->GetMyUserAccountInfo($_SESSION['userId']);
        return (array_merge(parent::GetData(), $accountInfo));
    }

}