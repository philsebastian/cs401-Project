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

            $this->model('StudentProfileModel');
            $this->loadView();
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("StudentsAccount.Index", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
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
        $this->model('StudentTeacherModel');
    }

}