<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="css/estilo.css">
        <?php require "php/DAO/ProdutoDAO.php";
            require "php/DAO/CategoriaDAO.php";
            $produtoDAO = new ProdutoDAO(); 
            $busca = "";

            if(isset($_GET['opcao'])){
                $opcao = $_GET['opcao'];

                if($opcao == "novidades"){
                    $produtos = $produtoDAO->listarNovos();
                    $nomeBusca = "Novidades";
                }else{
                    $categoriaDAO = new CategoriaDAO();
                    $categoria = $categoriaDAO->get($opcao);

                    if(isset($categoria)){
                        $produtos = $produtoDAO->listarCategoria($opcao);
                        $nomeBusca = $categoria['nome'];
                    }else{
                        $produtos = $produtoDAO->listar("");
                        $nomeBusca = "Todos os Produtos";
                    }
                }
            }else{
                if(isset($_GET['busca'])){
                    $busca = $_GET['busca'];
                }

                if($busca != ""){
                    $nomeBusca = "Busca por " . $busca;
                }else{
                    $nomeBusca = "Todos os Produtos";
                }
                
                $produtos = $produtoDAO->listar($busca);
            }
        ?>

        <title>Listando produtos - Hora do Café</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php"?>
        <div class="container-fluid">
            <div class="container pb-5">
                <div class="row mt-5 mb-3">
                    <div class="col-12 col-md-8">
                        <h1>Listando <?php echo $nomeBusca; ?></h1>
                    </div>
                    <div class="col-12 col-md-4">
                        <form action="listar.php" method="GET">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="busca" placeholder="<?php echo $busca; ?>">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-warning">Buscar</button>
                                    <?php if($busca != ""){?>
                                        <button type="button" onclick="window.location.href='listar.php';" class="btn btn-warning">Voltar</button>
                                    <?php }?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="row">
                        <?php
                            if(count($produtos) != 0){
                                foreach($produtos as $produto){?>
                                    <div class="col px-0 mb-4">
                                        <div class="card cardproduto">
                                            <img class="card-img-top" src="imgProduto/padrao.png">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                                                <p class="card-text"><?php echo $produto['descricao']; ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="detalhes.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else{ ?>
                                <div class="col px-0">
                                    <div class="jumbotron jumbotron-fluid">
                                        <div class="container text-center">
                                            <h1>Nada encontrado! 😢</h1>
                                            <p>Infelizmente nenhum produto foi encontrado.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "php/imprimeFooter.php"?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>