<?php
session_start();

class StudentsController extends Controller
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

}