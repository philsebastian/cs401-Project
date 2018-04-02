<?php
session_start();

class StudentsAccount extends Controller
{
    protected $content;

    public function __construct()
    {
        parent::__construct("account");
    }

    public function index()
    {
        $this->content = array("students" . DS . "_profile");

        if(isset($_SESSION['userId']) && isset($_SESSION['role']) && $_SESSION['role'] != 2)
        {
            $this->model('StudentProfileModel');
            $this->loadView("students" . DS . "core", $this->content);
            echo $this->out();
        }
        else
        {
            $_SESSION['errorMessage'] = "Unauthorized. Please login to proceed.";
            exit(header("Location: " . URLROOT . "login/"));
        }
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
        $controller = new StudentsTeacher();
        $controller->profile();

    }

}