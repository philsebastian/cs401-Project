<?php

class TeachersAccount extends TeachersController
{
    public function __construct()
    {
        session_start();
        parent::__construct("account");
    }

    public function index()
    {
        $this->model('TeacherAccountModel');
        $this->loadView(MAINCORE);
        echo $this->out();
    }

}