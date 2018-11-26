<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="../css/estilo.css">

        <title>Detalhes</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand" href="index.php"><img src="img/logohorizontal.png" width="150px"></img></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Página inicial</a><!--ATUALIZAR LINKS-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../detalhes.php?id=0">Sobre a cantina</a><!--ATUALIZAR LINKS-->
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <form class="form-inline" method="POST" action="php/login.php">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-link mr-3" href="" id="navbarLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login
                            </a>
                            <div class="dropdown-menu dropdown-menu-right px-2 py-3" aria-labelledby="navbarLogin">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Seu email">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Sua senha">
                                </div>
                                <button type="submit" class="btn btn-dark mt-4">Enviar</button
                            </div>
                        </li>
                    </form>
                    <form class="form-inline" method="POST" action="php/cadastrarUsuario.php">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-danger" href="" id="navbarLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cadastrar
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="navbarLogin">
                                <p class="text-center font-weight-bold">Cadastro</p>
                                <div class="form-group">
                                    <label for="nome">Nome: </label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="email">Email: </label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Seu email">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="senha">Senha: </label>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Sua senha">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="confirmar">Confirmar senha: </label>
                                    <input type="password" class="form-control" id="confirmar" name="confirmar" placeholder="Confirmar senha">
                                </div>
                                <button type="submit" class="btn btn-dark mt-4">Enviar</button
                            </div>
                        </li>
                    </form>
                </ul>
            </div>
        </nav>
        <div class="container-fluid py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <img src="img/padrao.jpg" class="rounded mx-auto d-block" width="300px" height="300px">
                    </div>
                    <div class="col-12 col-md-8">
                        <h1>Sanduíche</h1>
                        <div class="card flex-fill mt-5">
                            <div class="card-body">
                                <h5 class="card-title">R$11,00</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Retirada no local, no dia do pedido</h6>
                                <p class="card-text">Pão de hambúrguer, hambúrguer, maionese, alface, memes</p>
                                <form method="POST" action="php/comprar.php">
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
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
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
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid bg-warning py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 text-center text-md-left">
                        <p class="font-weight-bold">Hora do chá - A cantina que bomba</p>
                        <p>Grupo: Caio, Carlos Silva, Gabriel, Vinícius Perna.</p>
                    </div>
                    <div class="col-12 col-md-4 text-center text-md-left">
                        <p>Desenvolvimento para Web I</p>
                        <p>IFSP São Carlos</p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>