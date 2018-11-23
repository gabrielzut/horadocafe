<?php
    require "DAO/UsuarioDAO.php";

    $confirmar = $_POST['confirmar'];
    $usuario['senha'] = $_POST['senha'];
    $usuario['email'] = $_POST['email'];

    $usuarioDAO = new UsuarioDAO();

    if($usuarioDAO->login($usuario['email'],$confirmar)){
        $usuarioDAO->updateSenha($usuario);

        header('Location:../index.php');
    }else{
        header('Location:../index.php?msg=errosenha');
    }
?>