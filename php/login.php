<?php
    require "conn.php";
    require "DAO/UsuarioDAO.php";
    session_start();

    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $usuarioDAO = new UsuarioDAO();

    if($usuarioDAO->login($email,$senha)){
        $usuario = $usuarioDAO->get($email);
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['senha'] = $usuario['senha'];
        $_SESSION['admin'] = $usuario['admin'];

        if($_SESSION['admin'] == 0){
            header('Location:../index.php');
        }else{
            header('Location:../adminPedidos.php');
        }
    }else{
        header('Location:../index.php?msg=errologin');
    }
?>