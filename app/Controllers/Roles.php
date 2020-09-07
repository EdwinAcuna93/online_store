<?php


class Roles extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function roles(){
        $data['page_id'] = 3;
        $data['pageTag'] = 'Roles Usuario';
        $data['pageTitle']= 'Roles Usuario <small> Tienda Virtual </small>';
        $data['pageName'] = 'Rol_usuario';
        $this->views->getVIew($this,'roles',$data);
    }
}