<?php

class Home extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct("home");
    }

    public function index()
    {
        $this->model('HomeModel');
        $this->loadFullView(["main" . DS ."home"]);
        echo $this->out();
    }

}