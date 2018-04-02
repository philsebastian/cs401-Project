<?php

class SignupModel extends MainModel
{
    public function __construct()
    {
        parent::__construct('signup');
    }

    public function GetData()
    {
        $permissions = ["permissions" => $this->Dao->GetPermissionLevels()];
        return array_merge(parent::GetData(), $permissions);
    }
}