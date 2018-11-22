<?php
    require "DAO/UsuarioDAO.php";

    $usuario['email'] = $_POST['email'];
    $usuario['nome'] = $_POST['nome'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];

    if($senha != $confirmar){
        header('Location:../cadastro.php?msg=errosenha');
        exit;
    }

    $senhahash = md5($senha);
    $usuario['senha'] = $senhahash;

    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->insert($usuario);

    header('Location:../login.php?msg=sucesso')
?>