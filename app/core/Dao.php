<?php
session_start();

class Dao
{

    //private $host = "localhost";
    //private $db = "musicappdb";
    //private $user = "mlApp";
    //private $pass = "gIA41vz6qTzqA2Sv";

    private $host = "us-cdbr-iron-east-05.cleardb.net";
    private $db = "heroku_8e75c2deadccfe3";
    private $user = "b8094c43f3c6b3";
    private $pass = "efe13701";

    public function getConnection ()
    {
        return new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    }

    public function GetPermissionLevels()
    {
        // PHIL TODO -- change to query to builder of radio buttons
        $permissions = ["Student" => "1", "Teacher" => "2"];
        return $permissions;
    }

    public function GetUserIdAndRole(array $params)
    {
        $query = "SELECT
                         usernames.ID,
                         permissions.permissionLevelId
                  FROM (((allcreds
                         LEFT JOIN usernames ON usernames.ID = allcreds.usernameId)
                         LEFT JOIN permissions ON permissions.usernameId = allcreds.usernameId)
                         LEFT JOIN userinfo ON userinfo.usernameId = allcreds.usernameId)
                  WHERE
                         usernames.username = :username
                         AND
                         allcreds.login = :password
                         AND allcreds.inactivetime is null AND usernames.inactivetime is null AND permissions.inactivetime is null";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":username", $params["username"]);
        $q->bindParam(":password", $params["password"]);
        $q->execute();
        $results = $q->fetchAll();
        return $results[0];
    }

    public function GetUserAccountInfo($userId)
    {
        $query = "SELECT
                         usernames.username,
                         userinfo.lastname,
                         userinfo.firstname,
                         userinfo.street,
                         userinfo.city,
                         userinfo.theState as state,
                         userinfo.zip,
                         permissions.permissionLevelId
                  FROM (((allcreds
                         LEFT JOIN usernames ON usernames.ID = allcreds.usernameId)
                         LEFT JOIN permissions ON permissions.usernameId = allcreds.usernameId)
                         LEFT JOIN userinfo ON userinfo.usernameId = usernames.ID)
                  WHERE
                         allcreds.usernameId = :userId
                         AND allcreds.inactivetime is null AND usernames.inactivetime is null AND permissions.inactivetime is null AND userinfo.inactivetime is null";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":userId", $userId);
        $q->execute();
        $results = $q->fetchAll();
        return $results[0];
    }

    public function GetUserAccountInfoId($userId)
    {
        $query = "SELECT userinfo.ID FROM userinfo
                  WHERE userInfo.usernameId = :userId AND userinfo.inactivetime is null";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":userId", $userId);
        $q->execute();
        $results = $q->fetchAll();
        return $results[0]['ID'];
    }

    public function SetUserInfoInactive($oldUserInfo, $usernameId)
    {
        $query = "UPDATE userinfo SET inactivetime = now(), inactiveBy = :usernameId
                  WHERE ID = :id";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->bindParam(":usernameId", $usernameId);
        $q->bindParam(":id", $oldUserInfo);
        $q->execute();
    }

    public function IsUsernameAvailable($username)
    {
        $query = "SELECT usernames.username FROM usernames WHERE usernames.username = :username";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":username", $username);
        $q->execute();
        $results = $q->fetchAll();

        return (count($results) == 0);
    }

    public function GetNewUsernameId($username)
    {
        $insert = "INSERT INTO usernames (username) VALUES (:username);";
        $conn = $this->getConnection();
        $i = $conn->prepare($insert);
        $i->bindParam(":username", $username);
        $i->execute();

        $query = "SELECT usernames.ID FROM usernames WHERE usernames.username = :username AND usernames.inactivetime is null;";
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":username", $username);
        $q->execute();
        $results = $q->fetchAll();
        return $results[0]['ID'];
    }

    public function GetNewUserInfoId($usernameId, array $params)
    {
        $insert = "INSERT INTO userinfo (usernameId, lastname, firstname, street, city, theState, zip)
                   VALUES (:usernameId, :lastname, :firstname, :street, :city, :theState, :zip)";
        $conn = $this->getConnection();
        $i = $conn->prepare($insert);
        $i->bindParam(":usernameId", $usernameId);
        $i->bindParam(":lastname", $params['lastname']);
        $i->bindParam(":firstname", $params['firstname']);
        $i->bindParam(":street", $params['street']);
        $i->bindParam(":city", $params['city']);
        $i->bindParam(":theState", $params['state']);
        $i->bindParam(":zip", $params['zip']);
        $i->execute();

        $query = "SELECT userinfo.ID FROM userinfo WHERE userinfo.usernameId = :usernameId AND userinfo.inactivetime is null;";
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":usernameId", $usernameId);
        $q->execute();
        $results = $q->fetchAll();
        return $results[0]['ID'];
    }

    public function GetNewPasswordId($usernameId, $password)
    {
        $insert = "INSERT INTO allcreds (usernameId, login) VALUES (:usernameId, :password);";
        $conn = $this->getConnection();
        $i = $conn->prepare($insert);
        $i->bindParam(":usernameId", $usernameId);
        $i->bindParam(":password", $password);
        $i->execute();

        $query = "SELECT allcreds.ID FROM allcreds WHERE usernameId = :usernameId AND allcreds.inactivetime is null;";
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":usernameId", $usernameId);
        $q->execute();
        $results = $q->fetchAll();
        return $results[0]['ID'];
    }

    public function GetPermissionsId($usernameId, $permissionlevelId)
    {
        $insert = "INSERT INTO permissions (usernameId, permissionLevelId) VALUES (:usernameId, :permissionLevelId);";
        $conn = $this->getConnection();
        $i = $conn->prepare($insert);
        $i->bindParam(":usernameId", $usernameId);
        $i->bindParam(":permissionLevelId", $permissionlevelId);
        $i->execute();

        $query = "SELECT ID FROM permissions WHERE usernameId = :usernameId AND inactivetime is null;";
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":usernameId", $usernameId);
        $q->execute();
        $results = $q->fetchAll();
        return $results[0]['ID'];
    }

    public function LogMessage($severity, $location, $message)
    {
        $insert = "INSERT INTO serverLog (severity, location, message) VALUE (:severity, :location, :message);";
        $conn = $this->getConnection();
        $i = $conn->prepare($insert);
        $i->bindParam(":severity", $severity);
        $i->bindParam(":location", $location);
        $i->bindParam(":message", $message);
        $i->execute();
    }

} // end Dao