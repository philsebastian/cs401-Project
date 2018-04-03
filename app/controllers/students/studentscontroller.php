<?php
session_start();

class StudentsController extends Controller
{
    public function __construct($name)
    {
        Logger::LogTrace("StudentsController.__construct", "Checking role for construction of {$name}.");
        if(isset($_SESSION['usernameId']) && isset($_SESSION['role']) && $_SESSION['role'] != 2)
        {
            parent::__construct($name);
        }
        else
        {
            $_SESSION['errorMessage'] = "Unauthorized. Please login to proceed.";
            exit(header("Location: " . URLROOT . "login/"));
        }
    }

}