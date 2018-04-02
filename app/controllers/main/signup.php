<?php
session_start();

class Signup extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct('signup');
    }

    public function index()
    {
        $content = array("main" . DS . "_signup");
        $this->model('SignupModel');
        $this->loadView(MAINCORE, $content);
        echo $this->out();
    }

    public function addnew()
    {
        if (isset($_POST))
        {
            $session = new Session();
            $session->AddNewUser($_POST);
        }
        else
        {
            $_SESSION['errorMessage'] = "No information submitted. Please fill out form.";
            exit(header("Location: " . URLROOT . "signup/"));
        }
    }

}