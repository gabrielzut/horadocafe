<?php
    require "DAO/UsuarioDAO.php";

    $usuario['admin'] = $_POST['admin'];
    $usuario['email'] = $_POST['email'];

    $usuarioDAO = new UsuarioDAO();

    $usuarioDAO->updateAdmin($usuario);

    header('Location:../adminUsuarios.php');
?>