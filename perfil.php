<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="css/estilo.css">

        <script src="lib/jquery-3.3.1.min.js"></script>
        <?php require "php/verificaLogin.php";
        verificaLogin(); ?>

        <title>Gerenciando usuários - Hora do Café</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php";?>
        <div class="container-fluid">
            <div class="container">
                <div class="row my-5">
                    <div class="col-12">
                        <h1 class="text-center">Meu perfil</h1>
                    </div>
                </div>
                <?php 
                    if(isset($_GET['msg'])){
                        if($_GET['msg'] == "sucesso"){?>
                            <div class="alert alert-success"><span class="font-weight-bold">Mensagem:</span> perfil alterado com sucesso!</div>
                <?php
                        }
                    }
                ?>
                <form method="POST" action="php/atualizarUsuario.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $_SESSION['email']; ?>">
                </div>
                    <div class="form-group">
                        <label for="nome">Nome: </label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['nome']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nome">Nova senha: </label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Nova senha">
                    </div>
                    <input type="hidden" name="acao" value="alterar">
                    <p class="text-center"><button class="btn btn-warning mb-5" type="submit" name="origem" value="perfil">Enviar</button></p>
                </form>
            </div>
        </div>
        <?php require_once "php/imprimeFooter.php"?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>