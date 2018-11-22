<?php
    require "DAO/ProdutoDAO.php";

    $imagem = $_FILES['imagem'];

    if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){
        $produto['nome'] = $POST['nome'];
        $produto['descricao'] = $POST['descricao'];
        $produto['quantidade'] = $POST['quantidade'];
        
        $nomeTemp = $imagem['tmp_name'];
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

        $produtoDAO = new ProdutoDAO();
        $arrayResultado = $produtoDAO->lastId();

        $id = $ultimoId['auto_increment'];
        $produto['imagem'] = $id . "." . $extensao;

        move_uploaded_file($nomeTemp, './imgProduto/' . $produto['imagem']);
        $produtoDAO->insert($produto);

        header('Location:../adminProdutos.php?msg=sucesso');
    } else {
        header('Location:../adminProdutos.php?msg=erroimagem');
    }
?>