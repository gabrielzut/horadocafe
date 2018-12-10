<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="css/estilo.css">

        <?php require "php/DAO/ProdutoDAO.php";
        require "php/DAO/FeedbackDAO.php";
        require "php/DAO/UsuarioDAO.php";

        if(isset($_GET['id'])){
            if($_GET['id'] <= 1){
                header('Location: index.php');
            }

            $produtoDAO = new ProdutoDAO();
            $produto = $produtoDAO->get($_GET['id']);

            if(!(isset($produto))){
                header('Location: index.php');
            }
        }else{
            header('Location: index.php');
        }
        ?>

        <title>Detalhes de <?php echo $produto['nome'];?> - Hora do Café</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php"?>
        <div class="container-fluid py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <img src="imgProduto/<?php echo $produto['imagem'];?>" class="rounded mx-auto d-block img-fluid" width="300px" height="300px">
                    </div>
                    <div class="col-12 col-md-8">
                        <h1 class="text-center text-md-left"><?php echo $produto['nome'];?></h1>
                        <div class="card flex-fill mt-3">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo "R$" . number_format($produto['preco'], 2, ',', '');?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Retirada no local, no dia do pedido</h6>
                                <p class="card-text"><?php echo $produto['observacao'];?></p>
                                <form method="POST" action="php/adicionarCarrinho.php">
                                    <input type="hidden" name="idproduto" value="<?php echo $_GET['id'] ?>">
                                    <div class="row">
                                        <?php 
                                            if(isset($_SESSION['nome'])) {
                                                if($produto['quantidade'] > 0){?>
                                                    <div class="col-4">
                                                        <input type="number" class="form-control" value="1" min="1" max="<?php echo $produto['quantidade'] ?>" step="1" id="quantidade" name="quantidade" required>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="submit" class="btn btn-warning">Comprar</button>
                                                    </div>
                                        <?php 
                                                }else{
                                        ?>
                                                    <div class="col my-2">
                                                        <span class="alert alert-warning">Produto fora de estoque.</span>
                                                    </div>
                                        <?php
                                                }
                                            }else{ 
                                        ?>
                                                <div class="col my-2">
                                                    <span class="alert alert-warning">Você precisa estar logado para adicionar ao seu carrinho!</span>
                                                </div>
                                        <?php 
                                            } 
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-12">
                        <p class="font-weight-bold">Descrição</p>
                        <p><?php echo $produto['descricao'];?></p>
                    </div>
                    <div class="col-md-4 col-12">
                        <h3 class="text-center mb-3">O que os clientes pensam sobre <?php echo $produto['nome'];?></h3>
                        <div id="carouselFeedback" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $feedbackDAO = new FeedbackDAO();
                                $feedbacks = $feedbackDAO->listar($_GET['id']);
                                if(count($feedbacks) == 0){?>
                                    <div class="carousel-item active">
                                        <div class="card py-5">
                                            <h4 class="text-center my-3">Não existem avaliações para esse produto ainda!</h4>
                                        </div>
                                    </div>
                                    <?php 
                                }else{
                                    $primeiro = true;
                                    foreach($feedbacks as $feedback){?>
                                        <div class="carousel-item<?php if($primeiro) echo " active" ?>">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php 
                                                    if(isset($_SESSION['nome'])){
                                                        if($_SESSION['admin'] == 1 || $_SESSION['email'] == $feedback['emailUsuario']){?>
                                                        <form method="POST" action="php/excluirFeedback.php">
                                                            <input type="hidden" name="idProduto" value="<?php echo $feedback['idProduto'];?>">
                                                            <input type="hidden" name="emailUsuario" value="<?php echo $feedback['emailUsuario'];?>">
                                                            <button type="submit" class="btn btn-danger float-right">❌</button>
                                                        </form>
                                                    <?php }
                                                    }?>
                                                    <blockquote class="blockquote float-left mb-0">
                                                        <p><?php echo str_repeat("⭐",$feedback['nota']);?></p>
                                                        <p><?php echo $feedback['feedback'];?></p>
                                                        <footer class="blockquote-footer"><?php $usuarioDAO = new UsuarioDAO();
                                                        echo $usuarioDAO->get($feedback['emailUsuario'])['nome'];?></footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    $primeiro = false;
                                    }
                                }
                                ?>
                            </div>
                            <a id="prev" class="carousel-control-prev" href="#carouselFeedback" role="button" data-slide="prev">
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a id="next" class="carousel-control-next" href="#carouselFeedback" role="button" data-slide="next">
                                <span class="sr-only">Próximo</span>
                            </a>
                        </div>
                        <?php if(isset($_SESSION['nome'])){ ?>
                        <p class="text-center" data-toggle="modal" data-target="#modalFeedback"><a class="btn btn-sm btn-warning mt-1" href="#">Avaliar</a></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once "php/imprimeFooter.php"?>

        <div class="modal fade" id="modalFeedback" tabindex="-1" role="dialog" aria-labelledby="modalFeedback" aria-hidden="true">
            <form method="POST" action="php/cadastrarFeedback.php">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFeedback">Avaliar <?php $produto['nome'];?></h5>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">Atenção! Se você já avaliou este produto sua avaliação antiga será sobrescrita!</div>
                        <div class="form-group">
                            <label for="feedback">Sua avaliação: </label>
                            <input type="text" class="form-control" id="feedback" placeholder="O que você pensou sobre o nosso produto?" name="feedback">
                        </div>
                        <div class="form-group">
                            <label for="nota">Sua nota: </label>
                            <select class="form-control" id="nota" name="nota">
                                <option value="1">⭐</option>
                                <option value="2">⭐⭐</option>
                                <option value="3">⭐⭐⭐</option>
                                <option value="4">⭐⭐⭐⭐</option>
                                <option value="5">⭐⭐⭐⭐⭐</option>
                            </select>
                        </div>
                        <input type="hidden" name="idProduto" value="<?php echo $_GET['id']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-warning">Enviar</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>