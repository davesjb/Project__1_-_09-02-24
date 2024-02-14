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


    // Insert where what
    /*

    $table = "users";
    $data = [
        "username" => $username,
        "password => $password
    ];
    
    $database = new Database();
    $result = $database->insert($table, $data);

    (Chaining =>)
    */




    public function insert($table, $data)
    {


        $keys = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($keys) VALUES ($values)";

        $this->query($sql, $data);


        // username = "david"
        // password = "p"

        // Tables (users, products, sales, orders, etc)
        // create a correct SQL INSERT statement
        // INSERT query with positional placeholders :username :password







        // replace all actual values with placeholders
        // prepare the resulting query
        // execute the statement, sending all the actual values in the form of array.

    }

    /*
    UPDATE table_name
        SET column1 = value1, column2 = value2, ...
        WHERE condition;
        
    $data = [
        "username" => "david",
        "password" => "p"
    ];

    username = "david"
    password = "12345"
    id = 3
        */


    // $data = [
    //     "username" => "david",
    //     "password" => "p",
    //     "id" => 1
    // ];

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

    // Delete
    public function delete()
    {
    }

    // fetch all


}
