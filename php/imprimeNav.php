<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <a class="navbar-brand" href="index.php"><img src="img/logohorizontal.png" width="150px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Página inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sobre.php">Sobre a cantina</a>
            </li>
        </ul>
        <ul class="navbar-nav">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
            if($_SESSION['admin'] == 1){
        ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn btn-danger" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Área administrativa
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="adminPedidos.php">Pedidos</a>
                    <a class="dropdown-item" href="adminProdutos.php">Produtos</a>
                    <a class="dropdown-item" href="adminUsuarios.php">Usuários</a>
                </div>
            </li>
        <?php
            }
        ?>
            <li class="nav-item">
                <a class="nav-link" href="perfil.php">Meu perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="carrinho.php">Carrinho <span class="badge badge-danger"><?php echo isset($_SESSION['produtos']) ? count($_SESSION['produtos']) : "0";?></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="php/sair.php">Sair</a>
            </li>
        </ul>
        <?php
        }else{
        ?>
            <form class="form-inline" method="POST" action="php/login.php">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-link mr-3" href="" id="navbarLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu dropdown-menu-right px-2 py-3" aria-labelledby="navbarLogin">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Seu email" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Sua senha" required>
                        </div>
                        <button type="submit" class="btn btn-dark mt-4">Enviar</button>
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
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Email: </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Seu email" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="senha">Senha: </label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Sua senha" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="confirmar">Confirmar senha: </label>
                            <input type="password" class="form-control" id="confirmar" name="confirmar" placeholder="Confirmar senha" required>
                        </div>
                        <button type="submit" name="origem" value="nav" class="btn btn-dark mt-4">Enviar</button>
                    </div>
                </li>
            </form>
        </ul>
        <?php }?>
    </div>
</nav>