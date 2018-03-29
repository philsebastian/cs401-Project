<?php

class User extends Model
{
    protected $userId;
    protected $username;
    protected $name;
    protected $id;
    protected $authorizationLevel;

    public function __construct()
    {
        //Dao $Dao, $userId
        //$this->userId = $userId;
        //$this->Doa = $Dao;
        //$this->SetupUser();
    }

    private function SetupUser()
    {
        $userinformation = $this->GetUserRecord();
    }

    private function GetUserRecord()
    {
        $query = "  SELECT * FROM ((users
                    LEFT JOIN usernames on users.usernameId = usernames.ID)
                    LEFT JOIN userInfo on users.userInfoId = userInfo.ID)
                    WHERE users.ID = :id";
        $params = array(":id"=>$this->userId);
        return $this->Doa->RunSelectQuery($query, $params);
    }

    public function IsAuthorized($checkLevel)
    {
        return ($this->authorizationLevel == $checkLevel);
    }
}