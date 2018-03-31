<?php

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
        $this->loadFullView(["core"]);
        echo $this->out();
    }

}