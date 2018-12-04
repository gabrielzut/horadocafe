<?php
    require "verificaLogin.php";
    verificaAdmin();
    
    require "DAO/PedidoDAO.php";

    $pedidoDAO = new PedidoDAO();

    if($_POST["acao"] == "atender"){
        $pedidoDAO->atender($_POST['id']);
    }else if($_POST["acao"] == "remover"){
        $pedidoDAO->remove($_POST['id']);
    }

    header('Location: ../adminPedidos.php');
?>