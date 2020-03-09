<?php

class Routes {
    public function routes($page){
        switch ($page) {
            case 'register':
                $controller = "Site";
                $metodo = 'register';    
                break;
            
            case 'login':
                $controller = "Site";
                $metodo = 'login';    
                break;
            
            case 'perfil':
                $controller = "Site";
                $metodo = 'perfil';    
                break;
            
            case 'esqueci-senha':
                $controller = "Site";
                $metodo = 'esqueci_minha_senha';
                break;
                
            case 'logoff':
                $controller = "Site";
                $metodo = 'logoff';    
                break;
            
            default:
                $controller = "Site";
                $metodo = 'index';
                break;
        }

        require_once("./controller/$controller.php");   
        $site = new $controller;
        $data = $site->$metodo();
        return $data;
    }
}