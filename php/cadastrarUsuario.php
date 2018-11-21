<?php
    require "DAO/UsuarioDAO.php";

    $usuario['email'] = $POST['email'];
    $usuario['nome'] = $POST['nome'];
    $usuario['senha'] = $POST['senha'];

    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->insert($usuario);

    header('Location:../login.php?msg=sucesso')
?>