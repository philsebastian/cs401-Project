<?php

class Teach extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct('teach');
    }

    public function index()
    {
        $this->model('TeachModel');
        $this->loadFullView(["main" . DS ."teach"]);
        echo $this->out();
    }

}