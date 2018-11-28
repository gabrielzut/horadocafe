<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="css/estilo.css">

        <title>Detalhes</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php"?>
        <div class="container-fluid py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <img src="img/padrao.jpg" class="rounded mx-auto d-block img-fluid" width="300px" height="300px">
                    </div>
                    <div class="col-12 col-md-8">
                        <h1 class="text-center text-md-left">Sanduíche</h1>
                        <div class="card flex-fill mt-3">
                            <div class="card-body">
                                <h5 class="card-title">R$11,00</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Retirada no local, no dia do pedido</h6>
                                <p class="card-text">Pão de hambúrguer, hambúrguer, maionese, alface, memes</p>
                                <form method="POST" action="php/adicionarCarrinho.php">
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="quantidade" name="quantidade">
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-warning">Comprar</button>
                                        </div>
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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, suscipit non. Autem laboriosam facilis debitis. Perspiciatis cum quidem saepe optio, sed possimus impedit repellendus. Nesciunt repellendus adipisci rerum soluta quam! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis error repudiandae sapiente libero quo, accusamus adipisci provident suscipit odio ad neque eius laboriosam eligendi excepturi aliquam perferendis expedita natus nesciunt! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente distinctio delectus maxime iusto sit ratione minima quia, saepe officiis architecto perferendis sed qui fugit atque laboriosam voluptatum laudantium natus. Provident. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas repudiandae quaerat esse beatae cupiditate, debitis tempore ipsam impedit nostrum quis quod adipisci aut facere culpa enim expedita id libero totam.</p>
                    </div>
                    <div class="col-md-4 col-12">
                        <h3 class="text-center mb-3">O que os clientes pensam sobre Sanduíche</h3>
                        <div id="carouselFeedback" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                            <p>⭐⭐⭐</p>
                                            <p>Achei bom muito ruim gostei</p>
                                            <footer class="blockquote-footer">Usuário1</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                            <p>⭐⭐⭐⭐⭐</p>
                                            <p>Horrível, quase gorfei</p>
                                            <footer class="blockquote-footer">Usuário2</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                            <p>⭐</p>
                                            <p>Amei, melhor sanduíche de todos!!!!</p>
                                            <footer class="blockquote-footer">Usuário3</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a id="prev" class="carousel-control-prev" href="#carouselFeedback" role="button" data-slide="prev">
                                <span class="sr-only">Previous</span>
                            </a>
                            <a id="next" class="carousel-control-next" href="#carouselFeedback" role="button" data-slide="next">
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
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