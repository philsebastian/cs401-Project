<?php

class Login extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct('login');
    }

    public function index()
    {
        $this->model('LoginModel');
        $this->loadFullView(["core"]);
        echo $this->out();
    }

}