<?php
    date_default_timezone_set("America/Sao_Paulo");

    require "verificaLogin.php";
    verificaLogin();
    
    require "DAO/ProdutoDAO.php";
    require "DAO/PedidoDAO.php";

    $pedidoDAO = new PedidoDAO();
    $produtoDAO = new ProdutoDAO();

    $pedido['emailUsuario'] = $_SESSION['email'];
    $pedido['descricao'] = $_POST['descricao'];
    $horario = $_POST['horario'];
    $pedido['data'] = date("Y-m-d");
    $pedido['data'] = $pedido['data'] . " " . $horario;
    $pedido['produtos'] = $_SESSION['produtos'];
    $pedido['preco'] = $_POST['preco'];

    foreach($pedido['produtos'] as $produto){
        $infoproduto = $produtoDAO->get($produto['idproduto']);

        if($infoproduto['quantidade'] < $produto['quantidade']){
            header('Location: ../carrinho.php');
            exit;
        }
    }

    foreach($pedido['produtos'] as $produto){
        $infoproduto = $produtoDAO->get($produto['idproduto']);

        $infoproduto['quantidade'] = $infoproduto['quantidade'] - $produto['quantidade'];

        $produtoDAO->updateProduto($infoproduto);
    }

    $pedidoDAO->insert($pedido);
    $_SESSION['produtos'] = [];

    header('Location: ../index.php?msg=sucessopedido');
?>