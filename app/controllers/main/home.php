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
        $this->loadFullView(["core"]);
        echo $this->out();
    }

}