<?php


class Mysql extends Connection{
    private $connection;
    private $query;
    private $values;

    function __construct(){
        $this->connection = new Connection();
        $this->connection = $this->connection->connect();
    }

    /********************************* Insert a new register**********************************
     * @param string $query
     * @param array $values
     * @return int
     */
    public function insert(string $query,array $values){
        $this->query = $query;
        $this->values = $values;

        $stmt = $this->connection->prepare($this->query);
        $response = $stmt->execute($this->values);
        if ($response){
            $lastInsert = $this->connection->lastInsertId();
        } else {
            $lastInsert = 0;
        }
        return $lastInsert;
    }

    /*************************************Get single register*************************
     * @param string $query
     * @return mixed
     */
    public function select(string $query){
        $this->query = $query;
        $stmt = $this->connection->prepare($this->query);
        $stmt->execute();
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        return $response;
    }

    /**************************************Get all register****************************
     * @param string $query
     * @return mixed
     */
    public function selectAll(string $query){
        $this->query = $query;
        $stmt = $this->connection->prepare($this->query);
        $stmt->execute();
        $response = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $response;
    }

    /**************************************Update a single register*********************
     * @param string $query
     * @param array $values
     * @return mixed
     */
    public function update(string $query, array $values){
        $this->query = $query;
        $this->values = $values;

        $stmt = $this->connection->prepare($this->query);
        $response = $stmt->execute($this->values);
        return $response;

    }

    /****************************************Delete a register*******************************
     * @param string $query
     * @return mixed
     */
    public function delete(string $query){
        $this->query = $query;
        $stmt = $this->connection->prepare($this->query);
        $response = $stmt->execute();
        return $response;
    }


} // Class end