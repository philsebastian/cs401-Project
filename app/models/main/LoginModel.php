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
        $data = parent::GetData();
        $content = array('contents' => ["main" . DS . "_login"]);
        $data = array_merge($data, $content);

        if (isset($_SESSION['presets']['username']))
        {
            $username = ["username" => $_SESSION['presets']['username']];
            unset($_SESSION['presets']);
            $data = array_merge($data, $username);
        }

        return $data;
    }
}