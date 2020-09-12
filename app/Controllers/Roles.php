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

    public function getRoles(){
        $data = $this->model->selectRoles();
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }
}