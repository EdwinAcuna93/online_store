<?php
    class Home extends Controllers {
        public function __construct(){
            parent::__construct();
        }

        public function home(){
            $data['page_id'] = 1;
            $data['pageTag'] = 'Home';
            $data['pageTitle']= 'Pagina principal';
            $data['pageName'] = 'home';
            $data['pageContent'] = 'Este es el contenido de mi pagina web';
           $this->views->getVIew($this,'home',$data);
        }

    } //End