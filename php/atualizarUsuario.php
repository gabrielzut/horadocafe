<?php
    require "verificaLogin.php";
    verificaLogin();
    
    require "DAO/UsuarioDAO.php";
    session_start();

    if(isset($_POST['email'])){
        $usuario['email'] = $_POST['email'];
    }

    $acao = $_POST['acao'];

    $usuarioDAO = new UsuarioDAO();

    if($acao == "alterar"){
        if($_POST['origem'] == "perfil"){
            $usuario['email'] = $_SESSION['email'];
        }

        $usuario['nome'] = $_POST['nome'];

        if($_POST['senha'] != ""){
            $usuario['senha'] = md5($_POST['senha']);
            $usuarioDAO->updateSenha($usuario);
        }

        $origem = $_POST['origem'] == "perfil" ? "Location:../perfil.php?msg=sucesso" : "Location:../adminUsuarios.php?msg=sucesso";

        print_r($usuario);

        $usuarioDAO->update($usuario);

        if($usuario['email'] == $_SESSION['email']){
            $_SESSION['nome'] = $usuario['nome'];

            if($_POST['senha'] != ""){
                $_SESSION['senha'] = $usuario['senha'];
            }
        }

        header($origem);
    }else if($acao == "remover"){
        $usuario['admin'] = $_POST['admin'];
        if(($usuarioDAO->countAdmin() > 1) || ($usuario['admin'] == 0)){
            $usuarioDAO->remove($usuario['email']);
            header('Location:../adminUsuarios.php');
        }else{
            header('Location:../adminUsuarios.php?msg=erroadmin');
        }
    }else if($acao == "admin"){
        $usuario['admin'] = $_POST['admin'];
        if(($usuarioDAO->countAdmin() > 1) || ($usuario['admin'] == 0)){
            if($usuario['admin'] == 1){
                $usuario['admin'] = 0;
            }else{
                $usuario['admin'] = 1;
            }
            $usuarioDAO->updateAdmin($usuario);
            header('Location:../adminUsuarios.php');
        }else{
            header('Location:../adminUsuarios.php?msg=erroadmin');
        }
    }
    
?>