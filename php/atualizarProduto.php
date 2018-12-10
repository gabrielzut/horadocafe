<?php
    require "verificaLogin.php";
    verificaAdmin();
    
    require "DAO/ProdutoDAO.php";

    $produto['id'] = $_POST['id'];
    $produto['nome'] = $_POST['nome'];
    $produto['descricao'] = $_POST['descricao'];
    $produto['quantidade'] = $_POST['quantidade'];
    $produto['observacao'] = $_POST['observacao'];
    $produto['categoria'] = $_POST['categoria'];
    $produto['preco'] = $_POST['preco'];

    $produtoDAO = new ProdutoDAO();

    if(isset($_FILES['imagem'])){
        $imagem = $_FILES['imagem'];

        if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){   
            $nomeTemp = $imagem['tmp_name'];
            $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

            $produto['imagem'] = $produto['id'] . "." . $extensao;

            move_uploaded_file($nomeTemp, '../imgProduto/' . $produto['imagem']);

            $produtoDAO->updateImagem($produto);
        } else {
            header('Location:../adminProdutos.php?msg=erroimagem');
        }
    }

    $produtoDAO->updateProduto($produto);
    header('Location:../adminProdutos.php?msg=sucesso');
?>