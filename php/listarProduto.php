<?php
    require "DAO/ProdutoDAO.php";

    $produtoDAO = new ProdutoDAO();
    $produtos = ProdutoDAO.listar();

    foreach($produtos as $produto){
        echo "";
    }
?>