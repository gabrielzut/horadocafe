<?php
    require "verificaLogin.php";
    verificaAdmin();

    require "DAO/ProdutoDAO.php";
    $produtoDAO = new ProdutoDAO();

    if(isset($_POST['idproduto'])){
        $id = $_POST['idproduto'];
        $produtoDAO->remove($id);
    }

    header('Location: ../adminProdutos.php');
?>