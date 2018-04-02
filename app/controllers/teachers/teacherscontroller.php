<?php
session_start();

class TeachersController extends Controller
{
    public function __construct($name)
    {
        if(isset($_SESSION['usernameId']) && isset($_SESSION['role']) && $_SESSION['role'] != 1)
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