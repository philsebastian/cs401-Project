<?php
session_start();

class StudentsAccount extends StudentsController
{
    public function __construct()
    {
        parent::__construct("students account");
    }

    public function index()
    {
        try
        {
            $content = array("students" . DS . "_profile");

            $this->model('StudentProfileModel');
            $this->loadView(STUDENTCORE, $content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("StudentsAccount.Index", "Error: {$ex->getMessage()}");
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
        $controller = new studentsteacher();
        $controller->profile();

    }

}