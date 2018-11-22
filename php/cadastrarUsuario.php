<?php
    require "DAO/UsuarioDAO.php";

    $usuario['email'] = $POST['email'];
    $usuario['nome'] = $POST['nome'];
    $senha = md5($POST['senha']);
    $usuario['senha'] = $senha;

    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->insert($usuario);

    header('Location:../login.php?msg=sucesso')
?>