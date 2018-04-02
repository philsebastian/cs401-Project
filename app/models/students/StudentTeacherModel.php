<?php

class StudentTeacherModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('student teacher');
    }

    public function GetData()
    {
        // PHIL TODO --  currently stubbed
        $session = new User();
        $accountInfo = $session->GetMyUserAccountInfo($_SESSION['userId']);
        return (array_merge(parent::GetData(), $accountInfo));
    }

}