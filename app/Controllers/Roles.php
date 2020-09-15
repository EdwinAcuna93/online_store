<?php


class Roles extends Controllers{

    public function __construct(){
        parent::__construct();
    }

    /**
     * Méthod for return the index of roles
     * @return
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
     * @return data json format
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
                <button class="btn btn-secondary btn-sm btnPermissionsRol" id="'.$data[$i]['idRol'].'" title="Permisos"><i class="fas fa-key"></i></button>
                <button class="btn btn-primary btn-sm btnEditRol" id="'.$data[$i]['idRol'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm btnDeleteRol" id="'.$data[$i]['idRol'].'" title="Elimar"><i class="fas fa-key"></i></button>
            </div>';
        }
        //Return the data in Json format
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }

    /**
     * Method to insert a new rol
     */
    public function setRol(){

        //$rolName = strClean($_POST['rolName']);
        $rolName = filter_var(($_POST['rolName']) , FILTER_SANITIZE_STRING);
        $rolDescription = strClean($_POST['rolDescription']);
        $rolStatus = intval($_POST['rolStatus']);

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
