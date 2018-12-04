<?php
    require "verificaLogin.php";
    verificaAdmin();
    
    require "DAO/ProdutoDAO.php";

    if($_FILES['imagem']['size'] > 0){
        $imagem = $_FILES['imagem'];

        if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){
            $produto['nome'] = $_POST['nome'];
            $produto['descricao'] = $_POST['descricao'];
            $produto['observacao'] = $_POST['observacao'];
            $produto['preco'] = $_POST['preco'];
            
            $nomeTemp = $imagem['tmp_name'];
            $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);

            $produtoDAO = new ProdutoDAO();
            $ultimoId = $produtoDAO->lastId();

            $id = $ultimoId['auto_increment'];
            $produto['imagem'] = $id . "." . $extensao;

            move_uploaded_file($nomeTemp, '../imgProduto/' . $produto['imagem']);
            $produtoDAO->insert($produto);

            header('Location:../adminProdutos.php?msg=sucesso');
        } else {
            header('Location:../adminProdutos.php?msg=erroimagem');
        }
    }else{
        $produto['nome'] = $_POST['nome'];
        $produto['descricao'] = $_POST['descricao'];
        $produto['observacao'] = $_POST['observacao'];
        $produto['preco'] = $_POST['preco'];
        $produto['imagem'] = "padrao.png";

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->insert($produto);

        header('Location:../adminProdutos.php?msg=sucesso');
    }
?>