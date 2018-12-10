<?php
    require "verificaLogin.php";
    verificaAdmin();
    
    require "DAO/CategoriaDAO.php";

        $categoria['nome'] = $_POST['nome'];

        $categoriaDAO = new CategoriaDAO();
        $categoriaDAO->insert($categoria);

        header('Location:../adminProdutos.php');
?>