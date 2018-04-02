<?php
session_start();

class User
{
    private $Dao;

    public function __construct()
    {
        $this->Dao = new Dao();
    }

    public function validateLogin($username, $password)
    {
        $query = $this->Dao->GetUserIdAndRole(['username' => $username, 'password' => $password]);
        if (count($query) > 0)
        {
            session_regenerate_id();
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $query['Id'];
            $_SESSION['role'] = $query['permissionLevelId'];

            $this->RedirectBasedOnRole();
        }
        else
        {
            $_SESSION['errorMessage'] = "Incorrect email address or password. Please try again.";
            $_SESSION['presets']['username'] = $_POST['username'];
            exit(header("Location: " . URLROOT . "login/"));
        }
    }

    public function GetMyUserAccountInfo()
    {
        return $this->Dao->GetUserAccountInfo($_SESSION['userId']);
    }

    public function RedirectBasedOnRole()
    {
        switch ($_SESSION['role'])
        {
            case 1:
                exit(header("Location: " . URLROOT . "students/account/"));
            case 2:
                exit(header("Location: " . URLROOT . "teachers/account/"));
            case 3:
                exit(header("Location: " . URLROOT . "students/account/"));
        }
    }
}