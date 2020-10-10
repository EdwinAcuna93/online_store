<?php


class RolesModel extends Mysql{

    public $idRol;
    public $nameRol;
    public $descriptionRol;
    public $statusRol;

    public function __construct(){
        parent::__construct();
    }

    /**
     * Function to execute query select all in Mysql file.
     * @return mixed
     */
    public function selectRoles(){
        //$sql = "SELECT * FROM rol WHERE status !=0";
        $sql = "SELECT * FROM rol";
        $response = $this->selectAll($sql);
        return $response;
    }

    /**
     * Function to get single rol
     * @param int $id
     * @return mixed
     */
    public function selectRol( int $id){
        $this->idRol = $id;
        $sql = "SELECT * FROM rol WHERE idrol = $this->idRol";
        $response = $this->select($sql);
        return $response;
    }

    /**
     * Function to execute insert function in Mysql file.
     * @param string $name
     * @param string $description
     * @param int $status
     * @return int|string
     */
    public function insertRol(string $name, string $description, int $status){
        $response = "";
        $this->nameRol = $name;
        $this->descriptionRol = $description;
        $this->statusRol = $status;

        //Verify if the role exists
        $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->nameRol}'";
        $request = $this->selectAll($sql);

        if(empty($request)){
            $query_insert = "INSERT INTO rol(nombrerol,descripcion,status) VALUES (?,?,?)";
            $data = array($this->nameRol,$this->descriptionRol,$this->statusRol);
            $response = $this->insert($query_insert, $data);
        }else{
            $response = "exist";
        }

        return $response;
    }




}//class end