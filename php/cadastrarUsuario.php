<?php require "DAO/UsuarioDAO.php";

    $usuario['email'] = $_POST['email'];
    $usuario['nome'] = $_POST['nome'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];
    $origem = $_POST['origem'];

    $location = $origem == "nav" ? "Location:../index.php" : "Location:../adminUsuarios.php";

    if($senha != $confirmar){
        header($location . '?msg=errosenha');
        exit;
    }

    $usuarioDAO = new UsuarioDAO();

    if(count($usuarioDAO->get($usuario['email']) > 0)){
        header($location . '?msg=erroemail');
    }

    $senhahash = md5($senha);
    $usuario['senha'] = $senhahash;

    $usuarioDAO->insert($usuario);

    header($location . '?msg=sucesso');
?>