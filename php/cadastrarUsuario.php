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

    $usuarioDAO = new UsuarioDAO();

    if(count($usuarioDAO->get($usuario['email']) > 0)){
        header('Location:../cadastro.php?msg=erroemail');
    }

    $senhahash = md5($senha);
    $usuario['senha'] = $senhahash;

    $usuarioDAO->insert($usuario);

    header('Location:../login.php?msg=sucesso');
?>