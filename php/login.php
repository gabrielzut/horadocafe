<?php
    require "conn.php";
    require "DAO/UsuarioDAO.php";
    session_start();

    $email = $_POST["email"];
    $password = $_POST["senha"];

    $usuarioDAO = new UsuarioDAO();

    if($usuarioDAO->login($email,$senha)){
        $usuario = $usuarioDAO->get($email);
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['senha'] = $usuario['senha'];
        $_SESSION['admin'] = $usuario['admin'];

        header('Location:../index.php');
    }else{
        header('Location:../login.php?msg=errologin');
    }
?>