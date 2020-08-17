<?php
class Dashboard extends Controllers{
    public function __construct(){
        parent::__construct();
    }
    public function dashboard(){
        $data['page_id'] = 2;
        $data['pageTag'] = 'Dashboard - Tienda online';
        $data['pageTitle']= 'Dashboard - Tienda online';
        $data['pageName'] = 'dashboard';
        $this->views->getVIew($this,'dashboard',$data);
    }
}