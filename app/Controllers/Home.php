<?php
    class Home extends Controllers {
        public function __construct(){
            parent::__construct();
        }

        public function home(){
            $data['pageTag'] = 'Home';
            $data['pageTitle']= 'Pagina principal';
            $data['pageName'] = 'home';
            $data['pageContent'] = 'Este es el contenido de mi pagina web';
           $this->views->getVIew($this,'home',$data);
        }

        public function insert(){
            $data = $this->model->setUser('Pricila',19);
            print_r($data);
        }

        public function getuser($id){
            $data = $this->model->getUser($id  );
            print_r($data);
        }

        public function getusers(){
            $data = $this->model->getAllUsers();
            echo '<pre>';
            print_r($data);
            echo '</pre>';
        }

        public function updateuser(){
            $data = $this->model->updateUser(1,'Alexander',27);
            print_r($data);
        }

        public function deleteuser(){
            $data = $this->model->deleteUser(4);
            print_r($data);
        }

    } //End