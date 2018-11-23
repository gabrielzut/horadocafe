<?php
    require "DAO/UsuarioDAO.php";

    $usuario['nome'] = $_POST['nome'];
    $usuario['email'] = $_POST['email'];

    $usuarioDAO = new UsuarioDAO();

    $usuarioDAO->update($usuario);

    header('Location:../index.php');
?>