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
            $content = array('contents' => ["students" . DS . "account" . DS . "_profile"], 'view' => 'profile');
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
        try
        {
            if (isset($_POST))
            {
                $session = new Session();
                $session->UpdateUserInfo(STUDENTROOT, $_POST);
            }
            else
            {
                $_SESSION['errorMessage'] = "Error submitting information. Please try again.";
                exit(header("Location: " . STUDENTROOT));
            }
        }
        catch (Exception $ex)
        {
            Logger::LogError("StudentsAccount.update", "Error: {$ex->getMessage()}");
            $_SESSION['errorMessage'] = "Error submitting information. Please try again.";
            exit(header("Location: " . STUDENTROOT));
        }

    }

    public function reset()
    {
        echo "Reset";
    }

    public function payments()
    {
        try
        {
            $content = array('contents' => ["students" . DS . "account" . DS . "_payments"], 'view' => 'payment history');
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

    public function paymentinfo()
    {
        try
        {
            $content = array('contents' => ["students" . DS . "account" . DS . "_paymentaccount"], 'view' => 'payment account');
            $this->model('StudentProfileModel');
            $this->loadView($content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("StudentsAccount.paymentinfo", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

    public function myteacher()
    {
        try
        {
            $content = array('contents' => ["students" . DS . "account" . DS . "_teacherprofile"], 'view' => 'my teacher');
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