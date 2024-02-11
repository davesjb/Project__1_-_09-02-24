<?php

class Database
{
    private $hostname = "127.0.0.1";
    private $username = "david";
    private $password = "david";
    private $database = "login";
    private $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->hostname;dbname=$this->database";
            $this->pdo = new PDO($dsn, $this->username, $this->password);

            // Set PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
        }
    }

    // SELECT * FROM users WHERE username = :username


    public function query($sql, $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement;
    }

    public function fetch($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
