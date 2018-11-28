<?php
    require "DAO/PedidoDAO.php";

    $pedidoDAO = new PedidoDAO();
    $pedido['emailUsuario'] = $_SESSION['email'];
    $pedido['descricao'] = $_POST['descricao'];
    $pedido['data'] = $_POST['data'];
    $pedido['produtos'] = $_SESSION['produtos'];

    $pedidoDAO->insert($pedido);
    unset($_SESSION['produtos']);

    header('Location: index.php?msg=sucessopedido');
?>