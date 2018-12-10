<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/CSS" href="css/estilo.css">
        <?php
        require "php/verificaLogin.php";
        verificaLogin();

        require "php/DAO/ProdutoDAO.php"?>

        <title>Carrinho - Hora do Café</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php"?>
        <div class="container-fluid">
            <div class="container">
                <div class="row my-5">
                    <div class="col">
                        <h1 class="text-center">Seu carrinho</h1>
                    </div>
                </div>
                <ul class="list-group">
                    <?php 
                    $produtoDAO = new ProdutoDAO();
                    $produtos = $_SESSION['produtos'];
                    if(count($produtos) == 0){?>
                        <li class="list-group-item text-center"><h5>Não foram encontrados produtos!</h5></li>
                    <?php 
                    }else{
                        $total = 0;
                        foreach($produtos as $produto){
                            $infoproduto = $produtoDAO->get($produto['idproduto']);
                                $total = $total + ($produto['quantidade'] * $infoproduto['preco']);
                    ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <?php 
                                        if($infoproduto['quantidade'] < $produto['quantidade']){?>
                                            <div class="col-12 mb-2">
                                                <span class="alert alert-danger d-block">Houve um problema com seu pedido: a quantidade no carrinho é maior do que a em estoque. Em estoque: <?php echo $infoproduto['quantidade']; ?></span>
                                            </div>
                                        <?php }
                                    ?>
                                    <div class="col-12 col-md-2">
                                        <p class="text-center my-1"><img width="100px" height="100px" src="imgProduto/<?php echo $infoproduto['imagem']; ?>"></p>
                                    </div>
                                    <div class="col-12 col-md-7 text-center text-md-left">
                                        <h5 class="font-weight-bold"><?php echo $infoproduto['nome']; ?></h5>
                                        <p><?php echo $infoproduto['descricao']; ?></p>
                                        <h6><?php echo "R$" . number_format($produto['quantidade'] * $infoproduto['preco'], 2, ',', '') . " (R$" . number_format($infoproduto['preco'], 2, ',', '') . " a unidade)"; ?></h6>
                                    </div>
                                    <div class="col-12 col-md-3 text-center text-md-right">
                                        <div class="row">
                                            <div class="col">
                                                <form method="POST" action="php/adicionarCarrinho.php"?>
                                                <div class="input-group">
                                                        <label for="quantidade" class="mr-1">Quantidade:</label>
                                                        <input type="number" class="form-control" min="1" max="<?php echo $infoproduto['quantidade']; ?>" step="1" id="quantidade" name="quantidade" value="<?php echo $produto['quantidade']; ?>">
                                                        <span class="input-group-btn">
                                                            <button type="submit" class="btn btn-warning btn-sm ml-1">Atualizar</button>
                                                        </span>
                                                    </div>
                                                    <input type="hidden" name="idproduto" value="<?php echo $produto['idproduto']; ?>">
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <form method="POST" action="php/removerCarrinho.php"?>
                                                    <input type="hidden" name="idproduto" value="<?php echo $produto['idproduto']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2">Remover</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    <?php
                        }
                    } ?>
                </ul>
                <?php if(count($produtos) != 0){?>
                    <p class="text-center mt-3 mb-5"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalCompra">Finalizar compra</button></p>
                <?php }else{ ?>
                    <div class="mb-5"></div>
                <?php } ?>
            </div>
        </div>
        <?php require_once "php/imprimeFooter.php"?>

        <div class="modal fade" id="modalCompra" tabindex="-1" role="dialog" aria-labelledby="modalCompra" aria-hidden="true">
            <form method="POST" action="php/finalizarPedido.php" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFeedback">Finalizar Compra</h5>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning" role="alert">
                                Atenção: após finalizado o pedido, o usuário não pode desistir da compra!
                            </div>
                            <div class="form-group">
                                <label for="horario">Horário de retirada: </label>
                                <input type="time" class="form-control" min="7:00" max="21:30" id="horario" name="horario" required>
                            </div>
                            <div class="form-group">
                                <label for="descricao">Descrição: </label>
                                <input type="text" class="form-control" id="descricao" placeholder="Possíveis e observações sobre o pedido" name="descricao" required>
                            </div>
                            <p class="text-center font-weight-bold">Total a pagar: R$<?php echo number_format($total, 2, ',', ''); ?></p>
                            <input type="hidden" id="preco" name="preco" value="<?php echo $total; ?>">
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