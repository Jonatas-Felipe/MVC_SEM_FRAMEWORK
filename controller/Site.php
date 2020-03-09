<?php

class Site {

    public function index(){
        $data = array(        
            "page" => "index"
        );

        return $data;
    }

    public function register(){
        if (isset($_SESSION['logado'])){
            header('Location: '.base_url('/perfil'));
        } 
        
        require_once("./model/login.php");

        if(!empty($_POST)){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            
            $data = array(
                "nome" => $nome,
                "email" => $email,
                "senha" => $senha,
            );
            
            $register = new Login;            
            $registrado = $register->registerUser($data);

            if($registrado){
                header('Location: '.base_url('/login'));
            }else{
                echo "<p style='color: #f00;'>Erro ao registrar, verifique os dados e tente novamente.</p>";
            } 
        }

        $data = array(        
            "page" => "register",
        );

        return $data;
    }

    public function login(){
        if (isset($_SESSION['logado'])){
            header('Location: '.base_url('/perfil'));
        }

        require_once("./model/login.php");

        if(!empty($_POST)){
            
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            
            $data = array(
                "email" => $email,
                "senha" => $senha,
            );
            
            $login = new Login;
            $logado = $login->loginUser($data);
            

            if($logado){
                $_SESSION['logado'] = true;
                $_SESSION['dados_user'] = $logado;
                header('Location: '.base_url('/perfil'));
            }else{
                echo "<p style='color: #f00;'>Erro ao logar, verifique seus dados e tente novamente.</p>";
            }
        }


        $data = array(        
            "page" => "login",
        );

        return $data;
    }

    public function perfil(){
        if (!isset($_SESSION['logado'])){
            header('Location: '.base_url('login'));
        }  
        $dados_user = $_SESSION['dados_user'];
        
        $data = array(        
            "page" => "perfil",
            "dados_user" => $dados_user
        );
        
        return $data;
    }

    public function esqueci_minha_senha(){
        if (isset($_SESSION['logado'])){
            header('Location: '.base_url('perfil'));
        }  

        require_once("./model/login.php");

        if(!empty($_POST)){
            $email = $_POST['email'];
            
            $esqueci_senha = new Login;
            $user = $esqueci_senha->esqueciSenha($email);
            if($user){   
                $senha = $_POST['senha'];
                $repetir_senha = $_POST['repetir_senha'];

                if($senha === $repetir_senha){
                    $senha = md5($senha);  
                    $mudar_senha = new Login;
                    $senhaAlterada = $mudar_senha->mudarSenha($senha, $user['IdUser']);  
                }else{
                    echo "<p style='color: #f00;'>As senhas não combinam.</p>";    
                }
            }else{
                echo "<p style='color: #f00;'>Usuario não encontrado.</p>";
            }
        }      

        $data = array(
            'page' => 'esqueciSenha'
        );

        return $data;
    }

    public function logoff(){
        session_unset();
        header('Location: '.base_url(''));
    }
}