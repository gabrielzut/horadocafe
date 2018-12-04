<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="css/estilo.css">
        <?php
        require "php/verificaLogin.php";
        verificaAdmin();

        require "php/DAO/UsuarioDAO.php"?>

        <script src="lib/jquery-3.3.1.min.js"></script>
        <script src="js/alterarUsuario.js"></script>

        <title>Gerenciando usuários - Hora do Café</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php";
            $busca = "";
            if(isset($_GET['busca'])){
                $busca = $_GET['busca'];
            }
        ?>
        <div class="container-fluid">
            <div class="container">
                <div class="row my-5">
                    <div class="col-8">
                        <h1 class="text-center">Área administrativa - Usuários</h1>
                    </div>
                    <div class="col-4">
                        <form action="adminUsuarios.php" method="GET">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="busca" placeholder="<?php echo $busca ?>">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-warning">Buscar</button>
                                    <?php if($busca != ""){?>
                                        <button type="button" onclick="window.location.href='adminUsuarios.php';" class="btn btn-warning">Voltar</button>
                                    <?php }?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php 
                    if(isset($_GET['msg'])){
                        if($_GET['msg'] == "erroadmin"){?>
                            <div class="alert alert-danger"><span class="font-weight-bold">Erro:</span> o único administrador não pode ser alterado/removido.</div>
                <?php
                        }else if($_GET['msg'] == "erroemail"){?>
                            <div class="alert alert-danger"><span class="font-weight-bold">Erro:</span> o email fornecido já está em uso!</div>
                <?php
                        }else if($_GET['msg'] == "errosenha"){?>
                            <div class="alert alert-danger"><span class="font-weight-bold">Erro:</span> as senhas informadas não condizem!</div>
                <?php
                        }else if($_GET['msg'] == "sucesso"){?>
                            <div class="alert alert-success"><span class="font-weight-bold">Mensagem:</span> usuário cadastrado/alterado com sucesso!</div>
                <?php
                        }
                    }
                ?>
                <ul class="list-group">
                    <?php
                    $usuarioDAO = new UsuarioDAO();
                    $usuarios = $usuarioDAO->listar($busca);
                    if(count($usuarios) == 0){?>
                        <li class="list-group-item text-center"><h5>Não foram encontrados usuários!</h5></li>
                    <?php 
                    }else{
                        foreach($usuarios as $usuario){
                    ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-12 col-md-10 text-center text-md-left">
                                        <h5 class="font-weight-bold"><?php echo $usuario['nome']; ?></h5>
                                        <p><?php echo $usuario['email']; ?></p>
                                        <h6><?php echo $usuario['admin'] ? "Administrador" : "Cliente" ?></h6>
                                    </div>
                                    <div class="col-12 col-md-2 text-center text-md-right">
                                        <button type="button" class="btn btn-warning btn-sm alterar" data-toggle="modal" id="alterar" data-target="#modalAlterar">Alterar</button>
                                        <form method="POST" action="php/atualizarUsuario.php"?>
                                            <input type="hidden" name="email" value="<?php echo $usuario['email']; ?>">
                                            <input type="hidden" name="admin" value="<?php echo $usuario['admin']; ?>">
                                            <button type="submit" name="acao" value="remover" class="btn btn-danger btn-sm mt-1">Remover</button>
                                            <button type="submit" name="acao" value="admin" class="btn btn-success btn-sm mt-1"><?php if($usuario['admin']){?>Tornar cliente comum<?php }else{ ?>Tornar administrador<?php } ?></button>
                                        </form>
                                        <div class="email" style="display: none;"><?php echo $usuario['email']; ?></div>
                                        <div class="nome" style="display: none;"><?php echo $usuario['nome']; ?></div>
                                    </div>
                                </div>
                            </li>
                    <?php
                        }
                    } ?>
                </ul>
                <p class="text-center mt-3 mb-5"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalCadastro">Cadastrar</button></p>
            </div>
        </div>
        <?php require_once "php/imprimeFooter.php"?>

        <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastro" aria-hidden="true">
            <form method="POST" action="php/cadastrarUsuario.php" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFeedback">Cadastrar Usuário</h5>
                            </button>
                        </div>
                            <div class="modal-body">
                                <div class="form-group">
                                <label for="nome">Nome: </label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="senha">Senha: </label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="confirmar">Confirmar senha: </label>
                                <input type="password" class="form-control" id="confirmar" name="confirmar" placeholder="Confirmar senha" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-warning">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="modalAlterar" aria-hidden="true">
            <form method="POST" action="php/atualizarUsuario.php" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFeedback">Alterar Usuário</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nome">Nome: </label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                            </div>
                            <div class="form-group">
                                <label for="nome">Senha: </label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Nova senha">
                            </div>
                            <input type="hidden" id="email" name="email">
                            <input type="hidden" name="acao" value="alterar">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="origem" value="admin" class="btn btn-warning">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>