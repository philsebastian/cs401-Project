<?php
session_start();

class LoginModel extends MainModel
{

    public function __construct()
    {
        parent::__construct('login');
    }

    public function GetData()
    {
        if (isset($_SESSION['presets']['username']))
        {
            $username = ["username" => $_SESSION['presets']['username']];
            unset($_SESSION['presets']);
            $return = array_merge($username, parent::GetData());
        }
        else
        {
            $return = parent::GetData();
        }

        return $return;
    }
}