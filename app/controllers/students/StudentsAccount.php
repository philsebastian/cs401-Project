<?php
session_start();

class StudentsAccount extends StudentsController
{
    public function __construct()
    {
        if(isset($_SESSION['userId']) && isset($_SESSION['role']) && $_SESSION['role'] != 2)
        {
            parent::__construct("account");
        }
        else
        {
            $_SESSION['errorMessage'] = "Unauthorized. Please login to proceed.";
            exit(header("Location: " . URLROOT . "login/"));
        }
    }

    public function index()
    {
        $content = array("students" . DS . "_profile");


        $this->model('StudentProfileModel');
        $this->loadView(STUDENTCORE, $content);
        echo $this->out();

    }

    public function appointments()
    {

    }

    public function profile()
    {
        $this->index();
    }

    public function update()
    {
        // Submit changes here and redirect back to student/account/
    }

    public function myteacher()
    {
        $controller = new studentsteacher();
        $controller->profile();

    }

}