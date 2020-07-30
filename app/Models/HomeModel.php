<?php


class HomeModel extends Mysql {

    public function __construct(){
        parent::__construct();
    }

    public function setUser(string $name, int $age){
        $query = "INSERT INTO users(name,age) VALUES(?,?)";
        $data = array($name,$age);
        $requestInsert = $this->insert($query,$data);
        return $requestInsert;
    }


    public function getUser($id){
        $query = "SELECT * FROM users WHERE id = $id;";
        $request = $this->select($query);
        return $request;
    }

    public function getAllUsers(){
        $query = "SELECT * FROM users;";
        $request = $this->selectAll($query);
        return $request;
    }

    public function updateUser(int $id, string $name, int $age){
        $query = "UPDATE users SET name = ?, age = ? WHERE id = $id; ";
        $data = array($name, $age);
        $request = $this->update($query,$data);
        return $request;
    }

    public function deleteUser(int $id){
        $query = "DELETE FROM users WHERE id = $id";
        $request = $this->delete($query);
        return $request;
    }



}