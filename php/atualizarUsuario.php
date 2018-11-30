<?php
    require "DAO/UsuarioDAO.php";

    $usuario['email'] = $_POST['email'];
    $acao = $_POST['acao'];

    $usuarioDAO = new UsuarioDAO();

    if($acao == "alterar"){
        $usuario['nome'] = $_POST['nome'];

        $usuarioDAO->update($usuario);

        header('Location:../index.php');
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