<?php
session_start();

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
        $this->loadView(MAINCORE);
        echo $this->out();
    }

}