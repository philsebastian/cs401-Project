<?php
session_start();

class Session
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
            $_SESSION['usernameId'] = $query['ID'];
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
        return $this->Dao->GetUserAccountInfo($_SESSION['usernameId']);
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

    public function AddNewUser(array $info)
    {
        try
        {
            $this->CheckFields($info);
            $usernameId = $this->Dao->GetNewUsernameId($info['username']);
            $userInfoId = $this->Dao->GetNewUserInfoId($usernameId, $info);
            $passId = $this->Dao->GetNewPasswordId($usernameId, $info['password']);
            $permissionId = $this->Dao->GetPermissionsId($usernameId, $info['permissionlevel']);
            $_SESSION['successMessage'] = "Registration successful. Please sign in.";
            exit(header("Location: " . URLROOT . "login/"));
        }
        catch (Exception $ex)
        {
            $_SESSION['errorMessage'] = "Error occurred in registration please try again";
            $_SESSION['presets'] = $info;
            exit(header("Location: " . URLROOT . "signup/"));
        }
    }

    private function CheckFields(array $info)
    {
        $errorString = "";
        if(!$this->Dao->IsUsernameAvailable($info['username']))
        {
            $errorString .= "An account with this email address is already in use. Use a different email address.<br>";
        }
        if($_POST['password'] != $_POST['confpassword'])
        {
            $errorString .= "Password does not match. Please re-enter password.<br>";
        }
        if($_POST['street'] == "" || $_POST['city'] == "" || $_POST['zip'] == "")
        {
            $errorString .= "Address information incomplete. Please fill out all address fields.";
        }
        if($errorString != "")
        {
            $_SESSION['errorMessage'] = $errorString;
            $_SESSION['presets'] = $info;
            exit(header("Location: " . URLROOT . "signup/"));
        }
    }

    public function GetPermissionLevels()
    {
        return $this->Dao->GetPermissionLevels();
    }
}