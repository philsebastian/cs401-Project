<?php

class SignupModel extends MainModel
{
    public function __construct()
    {
        parent::__construct('signup');
    }

    public function GetData()
    {
        $session = new Session();
        $permissions = ["permissions" => $session->GetPermissionLevels()];

        if (isset($_SESSION['presets']))
        {
            $username = $_SESSION['presets'];
            unset($_SESSION['presets']);
            $return = array_merge($username, parent::GetData());
            $return = array_merge($return, $permissions);
        }
        else
        {
            $return = array_merge(parent::GetData(), $permissions);
        }

        return $return;
    }
}