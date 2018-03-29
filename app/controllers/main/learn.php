<?php

class Learn extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct('learn');
    }

    public function index()
    {
        $this->model('LearnModel');
        $this->loadFullView(["main" . DS ."learn"]);
        echo $this->out();
    }

}