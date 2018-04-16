<?php

class StudentTeacherModel extends StudentsModel
{
    public function __construct()
    {
        parent::__construct('teachers');
    }

    public function GetData($content)
    {
        $accountInfo = [];
        //$accountInfo = $this->User->GetMyUserAccountInfo($_SESSION['userId']);
        //$accountInfo = $accountInfo[0];
        return (array_merge(parent::GetData($content), $accountInfo));
    }

}