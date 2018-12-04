<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="css/estilo.css">
        <?php require "php/DAO/FeedbackDAO.php";
        require "php/DAO/UsuarioDAO.php"; ?>

        <title>Sobre - Hora do Café</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php"?>
        <div class="container-fluid">
            <div class="container">
                <h1 class="text-center mt-5">Sobre nós</h1>
                <div class="row">
                    <div class="col">
                        <div class="card-deck mt-3 mb-5">
                            <div class="card">
                                <img class="card-img-top" src="img/sobre1.jpg">
                                <div class="card-body">
                                    <h5 class="card-title">Cozinha</h5>
                                    <p class="card-text">Nossa cozinha é equipada com equipamentos de última geração e nossos profissionais são treinados nas mais renomadas universidades.</p>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="img/sobre2.jpg">
                                <div class="card-body">
                                    <h5 class="card-title">Alimentos</h5>
                                    <p class="card-text">Nossos alimentos são feitos com ingredientes 100% naturais, não-transgênicos e livres de conservantes.</p>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="img/sobre3.jpg">
                                <div class="card-body">
                                    <h5 class="card-title">Cantina</h5>
                                    <p class="card-text">Nossa cantina é organizada e acolhedora, com um espaço especial reservado para você. Venha fazer uma visita!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row mt-5">
                    <div class="col">
                        <h2 class="text-center mb-4">O que os clientes pensam sobre nossa cantina</h2>
                        <div id="carouselFeedback" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $feedbackDAO = new FeedbackDAO();
                                $feedbacks = $feedbackDAO->listar(1);
                                if(count($feedbacks) == 0){?>
                                    <div class="carousel-item active">
                                        <div class="card py-5">
                                            <h3 class="text-center my-3">Não existem avaliações ainda!</h3>
                                        </div>
                                    </div>
                                    <?php 
                                }else{
                                    $primeiro = true;
                                    foreach($feedbacks as $feedback){?>
                                        <div class="carousel-item<?php if($primeiro) echo " active" ?>">
                                            <div class="card">
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0 px-5 text-center">
                                                        <h3><?php echo str_repeat("⭐",$feedback['nota']);?></h3>
                                                        <h3><?php echo $feedback['feedback'];?></h3>
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
                                <span class="sr-only">Previous</span>
                            </a>
                            <a id="next" class="carousel-control-next" href="#carouselFeedback" role="button" data-slide="next">
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <?php if(isset($_SESSION['nome'])){ ?>
                        <p class="text-center" data-toggle="modal" data-target="#modalFeedback"><a class="btn btn-sm btn-warning mt-2" href="#">Avaliar</a></p>
                        <?php } ?>
                        <div class="mb-5"></div>
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
                            <h5 class="modal-title" id="modalFeedback">Avaliar nossa cantina</h5>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning">Atenção! Se você já avaliou a cantina sua avaliação antiga será sobrescrita!</div>
                            <div class="form-group">
                                <label for="feedback">Sua avaliação: </label>
                                <input type="text" class="form-control" id="feedback" placeholder="O que você pensou sobre a cantina?" name="feedback">
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
                            <input type="hidden" name="idProduto" value="1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="cantina" value="1" class="btn btn-warning">Enviar</button>
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