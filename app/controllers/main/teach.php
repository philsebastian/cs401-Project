<?php
session_start();

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
        $this->loadView(MAINCORE);
        echo $this->out();
    }

}