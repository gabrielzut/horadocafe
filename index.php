<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="css/estilo.css">

        <script src="lib/jquery-3.3.1.min.js"></script>
        <script src="js/modalIndex.js"></script>

        <?php require "php/DAO/ProdutoDAO.php"; ?>

        <title>Hora do Café</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php"; ?>
        <div class="container-fluid px-0">
            <div id="carouselAnuncio" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselAnuncio" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselAnuncio" data-slide-to="1"></li>
                    <li data-target="#carouselAnuncio" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block" src="img/slide1.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="img/slide2.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="img/slide3.jpg">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselAnuncio" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselAnuncio" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
            <div class="container">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container mb-0">
                        <h1>Novidades <small class="h6"><a href="listar.php?opcao=novidades">ver mais</a></small></h1>
                    </div>
                    <div class="row">
                        <?php
                            $produtoDAO = new ProdutoDAO();
                            $novidades = $produtoDAO->listar4Novos();

                            if(count($novidades) != 0){
                                foreach($novidades as $novidade){?>
                                    <div class="col px-0">
                                        <div class="card cardproduto mt-4">
                                            <img class="card-img-top" src="imgProduto/padrao.png">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $novidade['nome']; ?></h5>
                                                <p class="card-text"><?php echo $novidade['descricao']; ?></p>
                                                <a href="detalhes.php?id=<?php echo $novidade['id']; ?>" class="btn btn-warning">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else{ ?>
                                <div class="col px-0">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Não há produtos nesta categoria... Ainda!</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                </div>
                <div class="jumbotron jumbotron-fluid pt-0 mb-0">
                    <div class="container">
                        <h1>Salgados <small class="h6"><a href="listar.php?opcao=salgados">ver mais</a></small></h1>
                    </div>
                    <div class="row">
                        <?php
                            $produtoDAO = new ProdutoDAO();
                            $salgados = $produtoDAO->listar4Categoria("salgados");

                            if(count($salgados) != 0){
                                foreach($novidades as $salgado){?>
                                    <div class="col px-0">
                                        <div class="card cardproduto mt-4">
                                            <img class="card-img-top" src="imgProduto/padrao.png">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $salgado['nome']; ?></h5>
                                                <p class="card-text"><?php echo $salgado['descricao']; ?></p>
                                                <a href="detalhes.php?id=<?php echo $salgado['id']; ?>" class="btn btn-warning">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else{ ?>
                                <div class="col px-0">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Não há produtos nesta categoria... Ainda!</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                </div>
                <div class="jumbotron jumbotron-fluid pt-0 mb-0">
                    <div class="container">
                        <h1>Lanches <small class="h6"><a href="listar.php?opcao=lanches">ver mais</a></small></h1>
                    </div>
                    <div class="row">
                        <?php
                            $produtoDAO = new ProdutoDAO();
                            $lanches = $produtoDAO->listar4Categoria("lanches");

                            if(count($lanches) != 0){
                                foreach($lanches as $lanche){?>
                                    <div class="col px-0">
                                        <div class="card cardproduto mt-4">
                                            <img class="card-img-top" src="imgProduto/padrao.png">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $lanche['nome']; ?></h5>
                                                <p class="card-text"><?php echo $lanche['descricao']; ?></p>
                                                <a href="detalhes.php?id=<?php echo $lanche['id']; ?>" class="btn btn-warning">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else{ ?>
                                <div class="col px-0">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Não há produtos nesta categoria... Ainda!</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                </div>
                <div class="jumbotron jumbotron-fluid pt-0 mb-0">
                    <div class="container">
                        <h1>Pratos <small class="h6"><a href="listar.php?opcao=pratos">ver mais</a></small></h1>
                    </div>
                    <div class="row">
                        <?php
                            $produtoDAO = new ProdutoDAO();
                            $pratos = $produtoDAO->listar4Categoria("pratos");

                            if(count($pratos) != 0){
                                foreach($pratos as $prato){?>
                                    <div class="col px-0">
                                        <div class="card cardproduto mt-4">
                                            <img class="card-img-top" src="imgProduto/padrao.png">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $prato['nome']; ?></h5>
                                                <p class="card-text"><?php echo $prato['descricao']; ?></p>
                                                <a href="detalhes.php?id=<?php echo $prato['id']; ?>" class="btn btn-warning">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else{ ?>
                                <div class="col px-0">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Não há produtos nesta categoria... Ainda!</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                </div>
                <div class="jumbotron jumbotron-fluid pt-0 mb-0">
                    <div class="container">
                        <h1>Bebidas <small class="h6"><a href="listar.php?opcao=bebidas">ver mais</a></small></h1>
                    </div>
                    <div class="row">
                        <?php
                            $produtoDAO = new ProdutoDAO();
                            $bebidas = $produtoDAO->listar4Categoria("bebidas");

                            if(count($bebidas) != 0){
                                foreach($bebidas as $bebida){?>
                                    <div class="col px-0">
                                        <div class="card cardproduto mt-4">
                                            <img class="card-img-top" src="imgProduto/padrao.png">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $bebida['nome']; ?></h5>
                                                <p class="card-text"><?php echo $bebida['descricao']; ?></p>
                                                <a href="detalhes.php?id=<?php echo $bebida['id']; ?>" class="btn btn-warning">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else{ ?>
                                <div class="col px-0">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Não há produtos nesta categoria... Ainda!</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                </div>
                <div class="jumbotron jumbotron-fluid pt-0 mb-0">
                    <div class="container">
                        <h1>Guloseimas <small class="h6"><a href="listar.php?opcao=guloseimas">ver mais</a></small></h1>
                    </div>
                    <div class="row">
                        <?php
                            $produtoDAO = new ProdutoDAO();
                            $guloseimas = $produtoDAO->listar4Categoria("guloseimas");

                            if(count($guloseimas) != 0){
                                foreach($guloseimas as $guloseima){?>
                                    <div class="col px-0">
                                        <div class="card cardproduto mt-4">
                                            <img class="card-img-top" src="imgProduto/padrao.png">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $guloseima['nome']; ?></h5>
                                                <p class="card-text"><?php echo $guloseima['descricao']; ?></p>
                                                <a href="detalhes.php?id=<?php echo $guloseima['id']; ?>" class="btn btn-warning">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else{ ?>
                                <div class="col px-0">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Não há produtos nesta categoria... Ainda!</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                </div>
                <div class="jumbotron jumbotron-fluid pt-0">
                    <div class="container">
                        <h1>Todos produtos <small class="h6"><a href="listar.php">ver mais</a></small></h1>
                    </div>
                    <div class="row">
                        <?php
                            $produtoDAO = new ProdutoDAO();
                            $produtos = $produtoDAO->listar("");

                            if(count($produtos) != 0){
                                foreach($produtos as $produto){?>
                                    <div class="col px-0">
                                        <div class="card cardproduto mt-4">
                                            <img class="card-img-top" src="imgProduto/padrao.png">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                                                <p class="card-text"><?php echo $produto['descricao']; ?></p>
                                                <a href="detalhes.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }else{ ?>
                                <div class="col px-0">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Não há produtos nesta categoria... Ainda!</h5>
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

        <div class="modal fade" id="modal<?php 
            if(isset($_GET['msg'])){
                if($_GET['msg'] == "errosenha" || $_GET['msg'] == "sucessopedido" || $_GET['msg'] == "sucesso" || $_GET['msg'] == "errologin" || $_GET['msg'] == "negadouser" || $_GET['msg'] == "negadoadmin"){
                    echo "Msg";
        ?>" tabindex="-1" role="dialog" aria-labelledby="modalMsg" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mensagem</h5>
                    </div>
                    <div class="modal-body">
                        <?php 
                            switch($_GET['msg']){
                                case "errosenha":{ ?>
                                    <p><span class="font-weight-bold">Erro:</span> as senhas informadas não batem!</p>
                                <?php break;
                                }
                                case "sucessopedido":{ ?>
                                    <p>Pedido feito com sucesso!</p>
                                <?php break;
                                }
                                case "errologin":{ ?>
                                    <p><span class="font-weight-bold">Erro:</span> não foi possível reconhecer essa combinação de usuário/senha!</p>
                                <?php break;
                                }
                                case "negadouser":{ ?>
                                    <p><span class="font-weight-bold">Erro:</span> você precisa estar logado para acessar esse conteúdo!</p>
                                <?php break;
                                }
                                case "negadoadmin":{ ?>
                                    <p><span class="font-weight-bold">Erro:</span> você não tem permissão para acessar esse conteúdo!</p>
                                <?php break;
                                }
                                case "sucesso":{ ?>
                                    <p>Cadastro feito com sucesso!</p>
                                <?php break;
                                }
                            }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
            <?php }
            } ?>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>