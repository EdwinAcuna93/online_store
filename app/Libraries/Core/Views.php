<?php


class Views
{
    function getVIew($controller,$view){
        $controller = get_class($controller);
        if ($controller == 'Home'){
            $view = VIEWS.$view.'.php';
        } else{
            $view = VIEWS.$controller."/".$view.'.php';
        }
        require_once ($view);
    }
}

