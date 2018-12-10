<?php
    require "verificaLogin.php";
    verificaAdmin();
    
    require "DAO/PedidoDAO.php";
    require "DAO/ProdutoDAO.php";

    $pedidoDAO = new PedidoDAO();
    $produtoDAO = new ProdutoDAO();

    if($_POST["acao"] == "atender"){
        $pedidoDAO->atender($_POST['id']);
    }else if($_POST["acao"] == "remover"){
        $pedido = $pedidoDAO->get($_POST['id']);

        foreach($pedido['produtos'] as $produto){
            $infoproduto = $produtoDAO->get($produto['idProduto']);

            $infoproduto['quantidade'] = $infoproduto['quantidade'] + $produto['quantidade'];

            $produtoDAO->updateProduto($infoproduto);
        }

        $pedidoDAO->remove($_POST['id']);
    }

    header('Location: ../adminPedidos.php');
?>