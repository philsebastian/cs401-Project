<?php
session_start();

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
        $this->loadView(MAINCORE);
        echo $this->out();
    }

}