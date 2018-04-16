<?php
session_start();

class SignupModel extends MainModel
{
    public function __construct()
    {
        parent::__construct('signup');
    }

    public function GetData($content)
    {
        $data = parent::GetData($content);

        $session = new Session();
        $permissions = ["permissions" => $session->GetPermissionLevels()];
        $data = array_merge($data, $permissions);

        if (isset($_SESSION['presets']))
        {
            $userinfo = $_SESSION['presets'];
            unset($_SESSION['presets']);
            $data = array_merge($data, $userinfo);
        }

        return $data;
    }

}