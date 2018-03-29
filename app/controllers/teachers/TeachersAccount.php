<?php

class TeachersAccount extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct("account");
    }

    public function index()
    {
        $this->model('TeacherAccountModel');
        $this->loadFullView(["teachers" . DS ."account"]);
        echo $this->out();
    }

}