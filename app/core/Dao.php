<?php
session_start();

class Dao
{
    private $host = "localhost";
    private $db = "musicappdb";
    private $user = "mlApp";
    private $pass = "gIA41vz6qTzqA2Sv";

    public function getConnection ()
    {
        return new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    }

    public function RunInsertQuery ($query, array $params)
    {
        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        foreach($params as $key => $value)
        {
            $q->bindParam($key, $value);
        }
        $q->execute();
    }

    public function RunSelectQuery($query, array $params)
    {
        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        foreach($params as $key => $value)
        {
            $q->bindParam($key, $value);
        }
        $q->execute();
        return reset($q->fetchAll());
    }

    // PHIL TODO -- look into session
    public function GetPermissionLevels()
    {
        // PHIL TODO -- change to query to builder of radio buttons
        $permissions = ["Student" => "1", "Teacher" => "2"];
        return $permissions;
    }


    public function GetUserIdAndRole(array $params)
    {
        $query = "SELECT
                         usernames.Id,
                         permissions.permissionLevelId
                  FROM (((((credentials
                         LEFT JOIN usernames ON usernames.ID = credentials.usernameId)
                         LEFT JOIN allcreds ON allcreds.ID = credentials.ID)
                         LEFT JOIN permissions ON permissions.usernameId = credentials.usernameId)
                         LEFT JOIN users ON users.usernameId = credentials.usernameId)
                         LEFT JOIN userinfo ON userinfo.ID = users.userInfoId)
                  WHERE
                         usernames.username = :username
                         AND
                         allcreds.login = :password
                         AND allcreds.inactivetime is null AND users.inactivetime is null AND permissions.inactivetime is null";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":username", $params["username"]);
        $q->bindParam(":password", $params["password"]);
        $q->execute();
        $results = $q->fetchAll();
        return reset($results);
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
                  FROM (((((credentials
                         LEFT JOIN usernames ON usernames.ID = credentials.usernameId)
                         LEFT JOIN allcreds ON allcreds.ID = credentials.ID)
                         LEFT JOIN permissions ON permissions.usernameId = credentials.usernameId)
                         LEFT JOIN users ON users.usernameId = credentials.usernameId)
                         LEFT JOIN userinfo ON userinfo.ID = users.userInfoId)
                  WHERE
                         usernames.ID = :userId
                         AND allcreds.inactivetime is null AND users.inactivetime is null AND permissions.inactivetime is null";

        $conn = $this->getConnection();
        $q = $conn->prepare($query);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $q->bindParam(":userId", $userId);
        $q->execute();
        $results = $q->fetchAll();
        return reset($results);
    }

} // end Dao