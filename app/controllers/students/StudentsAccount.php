<?php

class StudentsAccount extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct("account");
    }

    public function index()
    {
        $this->model('StudentAccountModel');
        $this->loadFullView(["students" . DS ."account"]);
        echo $this->out();
    }

}