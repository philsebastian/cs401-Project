<?php
session_start();

class Contact extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct("contact");
    }

    public function index()
    {
        $this->model('ContactModel');
        $this->loadView(MAINCORE);
        echo $this->out();
    }

}