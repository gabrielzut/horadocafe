<?php
    require "DAO/ProdutoDAO.php";

    $produtoDAO = new ProdutoDAO();

    $produto = $produtoDAO->get($_GET['id']);

    echo "";
?>