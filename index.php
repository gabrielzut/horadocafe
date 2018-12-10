<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="css/estilo.css">

        <script src="lib/jquery-3.3.1.min.js"></script>
        <script src="js/modalIndex.js"></script>
        <script src="js/uploadImagem.js"></script>

        <?php require "php/DAO/ProdutoDAO.php"; 
        require "php/DAO/CategoriaDAO.php"; ?>

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
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){ ?>
                    <form action="php/alterarCarousel.php" method="POST" id="formCarousel" enctype="multipart/form-data">
                        <div class="carousel-item active">
                            <label for="imagem1">
                                <div class="slides">
                                    <img class="d-block slides" src="img/slide1.jpg">
                                </div>
                            </label>
                        </div>

                        <input id="imagem1" name="imagem1" type="file" accept="image/*" style="display: none;">

                        <div class="carousel-item">
                            <label for="imagem2">
                                <div class="slides">
                                    <img class="d-block slides" src="img/slide2.jpg">
                                </div>
                            </label>
                        </div>
                        
                        <input id="imagem2" name="imagem2" type="file" accept="image/*" style="display: none;">

                        <div class="carousel-item">
                            <label for="imagem3">
                                <div class="slides">
                                    <img class="d-block slides" src="img/slide3.jpg">
                                </div>
                            </label>
                        </div>

                        <input id="imagem3" name="imagem3" type="file" accept="image/*" style="display: none;">
                    </form>
                    <?php }else{ ?>
                    <div class="carousel-item active">
                        <img class="d-block" src="img/slide1.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="img/slide2.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="img/slide3.jpg">
                    </div>
                    <?php } ?>
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
                                    <div class="col px-0 mb-4">
                                        <div class="card cardproduto mt-4">
                                            <img class="card-img-top" src="imgProduto/<?php echo $novidade['imagem']; ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $novidade['nome']; ?></h5>
                                                <p class="card-text"><?php echo $novidade['descricao']; ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="text-center"><a href="detalhes.php?id=<?php echo $novidade['id']; ?>" class="btn btn-warning">Detalhes</a></p>
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
                <?php 
                    $categoriaDAO = new CategoriaDAO();
                    $categorias = $categoriaDAO->listar();


                    foreach($categorias as $categoria){
                ?>
                    <div class="jumbotron jumbotron-fluid pt-0 mb-0">
                        <div class="container">
                            <h1><?php echo $categoria['nome']; ?> <small class="h6"><a href="listar.php?opcao=<?php echo $categoria['id']; ?>">ver mais</a></small></h1>
                        </div>
                        <div class="row">
                            <?php
                                $produtoDAO = new ProdutoDAO();
                                $produtos = $produtoDAO->listar4Categoria($categoria['id']);

                                if(count($produtos) != 0){
                                    foreach($produtos as $produto){?>
                                        <div class="col px-0 mb-4">
                                            <div class="card cardproduto mt-4">
                                                <img class="card-img-top" src="imgProduto/<?php echo $produto['imagem']; ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                                                    <p class="card-text"><?php echo $produto['descricao']; ?></p>
                                                </div>
                                                <div class="card-footer">
                                                    <p class="text-center"><a href="detalhes.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning">Detalhes</a></p>
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
                <?php } ?>
                <div class="jumbotron jumbotron-fluid pt-0">
                    <div class="container">
                        <h1>Todos produtos <small class="h6"><a href="listar.php">ver mais</a></small></h1>
                    </div>
                    <div class="row">
                        <?php
                            $produtoDAO = new ProdutoDAO();
                            $produtos = $produtoDAO->listar4Aleatorios();

                            if(count($produtos) != 0){
                                foreach($produtos as $produto){?>
                                    <div class="col px-0 mb-4">
                                        <div class="card cardproduto mt-4">
                                            <img class="card-img-top" src="imgProduto/<?php echo $produto['imagem']; ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                                                <p class="card-text"><?php echo $produto['descricao']; ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="text-center"><a href="detalhes.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning">Detalhes</a></p>
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
                if($_GET['msg'] == "errosenha" || $_GET['msg'] == "sucessopedido" || $_GET['msg'] == "sucesso" || $_GET['msg'] == "errologin" || $_GET['msg'] == "negadouser" || $_GET['msg'] == "negadoadmin" || $_GET['msg'] == "erroImagem" || $_GET['msg'] == "sucessoImagem"){
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
                                case "erroImagem":{ ?>
                                    <p><span class="font-weight-bold">Erro:</span> o formato da imagem enviada não é suportado!</p>
                                <?php break;
                                }
                                case "sucessoImagem":{ ?>
                                    <p>Imagem alterada com sucesso!</p>
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