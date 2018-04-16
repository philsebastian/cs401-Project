<?php
session_start();

class LoginModel extends MainModel
{

    public function __construct()
    {
        parent::__construct('login');
    }

    public function GetData($content)
    {
        $data = parent::GetData($content);

        if (isset($_SESSION['presets']['username']))
        {
            $username = ["username" => $_SESSION['presets']['username']];
            unset($_SESSION['presets']);
            $data = array_merge($data, $username);
        }

        return $data;
    }
}