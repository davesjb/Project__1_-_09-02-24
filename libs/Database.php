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

    // Read
    public function fetch($sql, $params = [])
    {
        $statement = $this->query($sql, $params);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {


        $keys = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($keys) VALUES ($values)";

        $this->query($sql, $data);
    }

    // Update
    public function update($table, $data, $where, $params = [])
    {
        $set = "";
        // .= adding value
        foreach ($data as $column => $value) {
            $set .= "$column = :$column, ";
        }

        $set = rtrim($set, ", ");
        $sql = "UPDATE $table SET $set WHERE $where;";
        return $this->query($sql, array_merge($data, $params));
        // die($sql);
    }

    // Search: mysql delete query
    // DELETE FROM table_name WHERE condition;
    public function delete($table, $where, $params = [])
    {
        $sql = "DELETE FROM $table WHERE $where;";
        return $this->query($sql, $params);
    }

    // fetch all
    public function fetchAll($sql)
    {
        $statement = $this->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
