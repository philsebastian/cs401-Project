<?php
session_start();

class Session
{
    private $Dao;
    private $salt = "s@LT!ngA11d4th!n85";

    public function __construct()
    {
        $this->Dao = new Dao();
    }

    public function validateLogin($username, $password)
    {
        $hashedPassword = hash("sha256", $password . $this->salt);
        try
        {
            $query = $this->Dao->GetUserIdAndRole(['username' => $username, 'password' => $hashedPassword]);
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
        catch (Exception $ex)
        {
            $_SESSION['errorMessage'] = "Incorrect email address or password. Please try again.";
            $_SESSION['presets']['username'] = $_POST['username'];
            Logger::LogError("Session.validateLogin", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "login/"));
        }

    }

    public function GetMyUserAccountInfo()
    {
        $retArray = [];
        try
        {
            $retArray = $this->Dao->GetUserAccountInfo($_SESSION['usernameId']);
        }
        catch (Exception $ex)
        {
            Logger::LogError("Session.GetMyUserAccountInfo", "Error: {$ex->getMessage()}");
        }
        return $retArray;
    }

    public function GetUserAccountInfoId($usernameId)
    {
        $retValue = 0;
        try
        {
            $retValue = $this->Dao->GetUserAccountInfoId($usernameId);
        }
        catch (Exception $ex)
        {
            Logger::LogError("Session.GetUserAccountInfoId", "Error: {$ex->getMessage()}");
        }
        return $retValue;
    }

    public function RedirectBasedOnRole()
    {
        try
        {
            if (isset($_SESSION['role']))
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
            else
            {
                echo "Role not set";
                die();
            }
        }
        catch (Exception $ex)
        {
            Logger::LogError("Session.RedirectBasedOnRole", "Error: {$ex->getMessage()}");
            exit(header("Location: " . URLROOT . "home"));
        }
    }

    public function AddNewUser(array $info)
    {
        try
        {
            $this->CheckAllFields($info);
            $usernameId = $this->Dao->GetNewUsernameId($info['username']);
            $userInfoId = $this->Dao->GetNewUserInfoId($usernameId, $info);

            $hashedPassword = hash("sha256", $info['password'] . $this->salt);

            $passId = $this->Dao->GetNewPasswordId($usernameId, $hashedPassword);
            $permissionId = $this->Dao->GetPermissionsId($usernameId, $info['permissionlevel']);
            $_SESSION['successMessage'] = "Registration successful. Please sign in.";
            exit(header("Location: " . URLROOT . "login/"));
        }
        catch (Exception $ex)
        {
            $_SESSION['errorMessage'] = "Error occurred in registration. Please try again. Error: {$ex->getMessage}";
            $_SESSION['presets'] = $info;
            Logger::LogError("Session.AddNewUser", "Error: {$ex->getMessage()}");

            exit(header("Location: " . URLROOT . "signup/"));
        }
    }

    public function UpdateUserInfo($originating_page, array $info)
    {
        try
        {
            $usernameId = $_SESSION['usernameId'];
            $this->CheckAddressFields($originating_page, $info);
            $oldUserInfo = $this->Dao->GetUserAccountInfoId($usernameId);
            $this->Dao->SetUserInfoInactive($oldUserInfo, $usernameId);
            $userInfoId = $this->Dao->GetNewUserInfoId($usernameId, $info);

            $_SESSION['successMessage'] = "Account information update successful.";
            exit(header("Location: {$originating_page}"));
        }
        catch (Exception $ex)
        {
            $_SESSION['errorMessage'] = "Error while updating information. Please try again. Error: {$ex->getMessage}";
            $_SESSION['presets'] = $info;
            Logger::LogError("Session.UpdateUserInfo", "Error: {$ex->getMessage()}");

            exit(header("Location: {$originating_page}"));
        }
    }

    private function CheckAllFields(array $info)
    {
        $errorString = "";
        if(!$this->Dao->IsUsernameAvailable($info['username']))
        {
            $errorString .= "An account with this email address is already in use. Use a different email address.<br>";
        }
        if (!preg_match($info['password'], FILTERPASSWORD)) {
            $errorString = "Invalid password format. Please choose a new password.<br>";
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

    private function CheckAddressFields($originating_page, array $info)
    {
        $errorString = "";
        if($_POST['street'] == "" || $_POST['city'] == "" || $_POST['zip'] == "")
        {
            $errorString .= "Address information incomplete. Please fill out all address fields.";
        }
        if($errorString != "")
        {
            $_SESSION['errorMessage'] = $errorString;
            $_SESSION['presets'] = $info;
            exit(header("Location: {$originating_page}"));
        }
    }

    public function GetPermissionLevels()
    {
        return $this->Dao->GetPermissionLevels();
    }
}