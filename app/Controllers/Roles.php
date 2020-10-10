<?php


class Roles extends Controllers{

    public function __construct(){
        parent::__construct();
    }

    /**
     * Méthod for return the index of roles
     *
     */
    public function roles(){
        $data['page_id'] = 3;
        $data['pageTag'] = 'Roles Usuario';
        $data['pageTitle']= 'Roles Usuario <small> Tienda Virtual </small>';
        $data['pageName'] = 'Rol_usuario';
        $this->views->getVIew($this,'roles',$data);
    }


    /**
     * Get all roles
     * @return $data json format
     */
    public function getRoles(){
        $data = $this->model->selectRoles();

        for ($i = 0; $i < count($data); $i++){
            if ($data[$i]['status'] == 1){
                $data[$i]['status'] = '<span class="badge badge-success">Activo</span>';
            } else{
                $data[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
            }

            $data[$i]['options'] = '<div class="text-center">
                <button class="btn btn-secondary btn-sm btnPermissionsRol" rl="'.$data[$i]['idrol'].'" title="Permisos"><i class="fas fa-key"></i></button>
                <button class="btn btn-primary btn-sm btnEditRol" rl="'.$data[$i]['idrol'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btnDeleteRol" rl="'.$data[$i]['idrol'].'" title="Elimar"><i class="fas fa-key"></i></button>
            </div>';
        }
        //Return the data in Json format
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * Function to get a single register
     * @param int $idRol
     * @return $response
     */
    public function getRol(int $idRol){
        $idRol = intval(strClean($idRol));
        if ($idRol > 0){
            $data = $this->model->selectRol($idRol);
            if (!empty($data)){
                $response = array('status' => true, 'data' => $data);
            }else{
                $response = array('status' => false, 'msg' => 'Datos no encontrados');
            }
            echo json_encode($response,JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * Method to insert a new rol
     *
     * @return $data
     */
    public function setRol(){

        //$rolName = strClean($_POST['nameROl']);
        $rolName = filter_var(($_POST['nameRol']) , FILTER_SANITIZE_STRING);
        $rolDescription = strClean($_POST['descriptionRol']);
        $rolStatus = intval($_POST['statusRol']);

        $request_rol = $this->model->insertRol($rolName,$rolDescription,$rolStatus);

        //verify the model's answer
        if($request_rol > 0){
            $response = array('status' => true, 'msg' => 'Registro agregado correctamente.');
        }else if($request_rol == 'exist') {
            $response = array('status' => false, 'msg' => '¡Atención el rol ya existe!');
        }else{
            $response = array('status' => false,'msg' => 'Ha ocurrio un error al guardar el registro.');
        }
        echo json_encode($response,JSON_UNESCAPED_UNICODE);
        die();
    }
}
