<?php

class StudentTeacherModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('student teacher');
    }

    public function GetData()
    {
        $accountInfo = $this->User->GetMyUserAccountInfo($_SESSION['userId']);
        $accountInfo = $accountInfo[0];
        return (array_merge(parent::GetData(), $accountInfo));
    }

}