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

        require "php/DAO/PedidoDAO.php";
        require "php/DAO/UsuarioDAO.php";
        require "php/DAO/ProdutoDAO.php" ?>

        <title>Gerenciando pedidos - Hora do Café</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php"?>
        <div class="container-fluid">
            <div class="container">
                <div class="row my-5">
                    <div class="col">
                        <h1 class="text-center">Área administrativa - Pedidos</h1>
                    </div>
                </div>
                <ul class="list-group mb-5">
                    <?php
                    $pedidoDAO = new PedidoDAO();
                    $pedidos = $pedidoDAO->listar();
                    if(count($pedidos) == 0){?>
                        <li class="list-group-item text-center"><h5>Não foram encontrados pedidos!</h5></li>
                    <?php 
                    }else{
                        $produtoDAO = new ProdutoDAO();
                        $usuarioDAO = new UsuarioDAO();
                        foreach($pedidos as $pedido){
                    ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-12 col-md-10 text-center text-md-left">
                                        <h5 class="font-weight-bold"><?php echo $pedido['id']; ?></h5>
                                        <p>Feito por <?php echo $usuarioDAO->get($pedido['emailUsuario'])['nome']; ?></p>
                                        <p><?php 
                                            $produtos = "";
                                            foreach($pedido['produtos'] as $produto){
                                                $infoproduto = $produtoDAO->get($produto['idProduto']);
                                                $produtos = $infoproduto['nome'] . " (" . $produto['quantidade'] . ")" . ", " . $produtos;
                                            }
                                            $produtos = substr($produtos,0,-2);
                                            echo $produtos;
                                        ?></p>
                                        <h6><?php echo $pedido['data']?></h6>
                                    </div>
                                    <div class="col-12 col-md-2 text-center text-md-right">
                                        <form method="POST" action="php/atenderPedido.php"?>
                                            <input type="hidden" name="id" value="<?php echo $pedido['id']; ?>">
                                            <button type="submit" name="acao" value="atender" class="btn btn-warning btn-sm mt-1">Atender pedido</button>
                                            <button type="submit" name="acao" value="remover" class="btn btn-danger btn-sm mt-1">Remover pedido</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                    <?php
                        }
                    } ?>
                </ul>
            </div>
        </div>
        <?php require_once "php/imprimeFooter.php"?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>