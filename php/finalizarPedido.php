<?php
    require "verificaLogin.php";
    verificaLogin();
    
    require "DAO/PedidoDAO.php";
    session_start();

    $pedidoDAO = new PedidoDAO();
    $pedido['emailUsuario'] = $_SESSION['email'];
    $pedido['descricao'] = $_POST['descricao'];
    $horario = $_POST['horario'];
    $pedido['data'] = date("Y-m-d");
    $pedido['data'] = $pedido['data'] . " " . $horario;
    $pedido['produtos'] = $_SESSION['produtos'];
    $pedido['preco'] = $_POST['preco'];

    $pedidoDAO->insert($pedido);
    $_SESSION['produtos'] = [];

    header('Location: ../index.php?msg=sucessopedido');
?>