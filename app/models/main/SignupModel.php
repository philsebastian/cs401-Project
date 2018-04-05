<?php

class SignupModel extends MainModel
{
    public function __construct()
    {
        parent::__construct('signup');
    }

    public function GetData()
    {
        $data = parent::GetData();

        $session = new Session();
        $permissions = ["permissions" => $session->GetPermissionLevels()];
        $data = array_merge($data, $permissions);

        $content = array("contents" => ["main" . DS . "_signup"]);
        $data = array_merge($data, $content);

        if (isset($_SESSION['presets']))
        {
            $userinfo = $_SESSION['presets'];
            unset($_SESSION['presets']);
            $data = array_merge($data, $userinfo);
        }

        return $data;
    }

}