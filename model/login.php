<?php

class Login {
    public function loginUser($data){
        require ("./config/database/index.php");
        $query = 'SELECT * FROM users where NmEmail = "'.$data['email'].'" and CdSenha = "'.$data['senha'].'"';
        $result = $conn->query($query);
        if($result){
            return $result->fetch_array();
        }else{
            return false;
        }    
    } 

    public function registerUser($data){
        require ("./config/database/index.php");

        $query = 'INSERT INTO users (NmNome, NmEmail, CdSenha) VALUES ("'.$data['nome'].'", "'.$data['email'].'", "'.$data['senha'].'")';
        
        $result = $conn->query($query);
        if($result){
            return true;
        }else{
            return false;
        }    
    }

    public function esqueciSenha($email){
        require ("./config/database/index.php");
        $query = 'SELECT IdUser FROM users WHERE NmEmail = "'.$email.'"';
        $result = $conn->query($query);
        
        if($result){
            return $result->fetch_array();
        }else{
            return false;
        }
    }

    public function mudarSenha($senha, $id){ 
        require ("./config/database/index.php");
        $query = 'UPDATE users SET CdSenha = "'.$senha.'" WHERE IdUser = '.$id;
        $result = $conn->query($query);
        
        if($result){
            return true;
        }else{
            return false;
        }
    } 
}
