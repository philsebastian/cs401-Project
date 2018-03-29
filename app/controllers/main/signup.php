<?php

class Signup extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct('signup');
    }

    public function index()
    {
        $this->model('SignupModel');
        $this->loadFullView(["main" . DS ."signup"]);
        echo $this->out();
    }

}