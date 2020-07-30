<?php

class Connection{
    private $connection;

    public function __construct(){
        $connectionString = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';'.DB_CHARSET;
        try {
            $this->connection = new PDO($connectionString, DB_USER,DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            $this->connection = 'Error de conexión';
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function connect(){
        return $this->connection;
    }

}