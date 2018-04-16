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
        try
        {            
            $content = array("contents" => ["main" . DS . "_signup"]);

            $this->model('SignupModel');
            $this->loadView(MAINCORE, $content);
            echo $this->out();
        }
        catch (Exception $ex)
        {
            Logger::LogError("Signup.index", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

    public function addnew()
    {
        try
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
        catch (Exception $ex)
        {
            Logger::LogError("Signup.addnew", "Error: {$ex->getMessage()}");
            $_SESSION['errorMessage'] = "Error during signup process. Please try again.";
            exit(header("Location: " . URLROOT . "signup/"));
        }
    }

}