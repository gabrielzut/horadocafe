<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="../css/estilo.css">

        <title>MODELO!</title><!--ATUALIZAR-->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand" href="../index.php"><!--ATUALIZAR LINKS--><img src="../img/logohorizontal.png" width="150px"></img></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><!--ATUALIZAR O ACTIVE PRA PÁGINA QUE O USUÁRIO ESTÁ-->
                        <a class="nav-link" href="../index.php">Página inicial</a><!--ATUALIZAR LINKS-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../detalhes.php?id=0">Sobre a cantina</a><!--ATUALIZAR LINKS-->
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <form class="form-inline">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-link mr-3" href="" id="navbarLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login
                            </a>
                            <div class="dropdown-menu dropdown-menu-right px-2 py-3" aria-labelledby="navbarLogin">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Seu email">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" id="senha" placeholder="Sua senha">
                                </div>
                                <button type="submit" class="btn btn-dark mt-4">Enviar</button
                            </div>
                        </li>
                    </form>
                    <form class="form-inline">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-danger" href="" id="navbarLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cadastrar
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="navbarLogin">
                                <p class="text-center font-weight-bold">Cadastro</p>
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" placeholder="Seu nome">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Seu email">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" id="senha" placeholder="Sua senha">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="confirmar">Confirmar senha</label>
                                    <input type="password" class="form-control" id="confirmar" placeholder="Sua senha">
                                </div>
                                <button type="submit" class="btn btn-dark mt-4">Enviar</button
                            </div>
                        </li>
                    </form>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="container">
                <h1>Página teste</h1>
                <p>Salgado</p>
                <p>Salgaderia</p>
                <p>Salgadinho</p>
                <p>Salgadão</p>
                <p>Salgadoce</p>
                <p>Salgrosso</p>
                <p>Salitre</p>
                <p>Sal</p>
                <p>MEU AMIGO</p>
                <p>ROBSO</p>
            </div>
        </div>
        <footer class="container-fluid bg-warning">
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