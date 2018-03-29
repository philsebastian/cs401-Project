<?php

class Dao
{
    private $host = "localhost";
    private $db = "ckenning";
    private $user = "ckenning";
    private $pass = "password";

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

} // end Dao