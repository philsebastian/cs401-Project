<?php
session_start();

class StudentsAccount extends StudentsController
{
    public function __construct()
    {
        parent::__construct("account");
    }

    public function index()
    {
        try
        {
            $content = array('contents' => ["students" . DS . "_profile"], 'view' => 'profile');
            $this->model('StudentProfileModel');
            $this->loadView($content);
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
        echo "Update";
        // Submit changes here and redirect back to student/account/
    }

    public function reset()
    {
        echo "Reset";
    }

    public function payments()
    {
        try
        {
            $content = array('contents' => ["students" . DS . "_payments"], 'view' => 'payments');
            $this->model('StudentProfileModel');
            $this->loadView($content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("StudentsAccount.payments", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

    public function myteachers()
    {
        try
        {
            $content = array('contents' => ["students" . DS . "_teacherprofile"], 'view' => 'my teachers');
            $this->model('StudentProfileModel');
            $this->loadView($content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("StudentsAccount.myteachers", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

}