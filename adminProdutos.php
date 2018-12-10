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
        
        require "php/DAO/ProdutoDAO.php";
        require "php/DAO/CategoriaDAO.php"?>

        <script src="lib/jquery-3.3.1.min.js"></script>
        <script src="js/alterarProduto.js"></script>

        <title>Gerenciando produtos - Hora do Café</title>
    </head>
    <body>
        <?php require_once "php/imprimeNav.php";
        $busca = "";
            if(isset($_GET['busca'])){
                $busca = $_GET['busca'];
            }
        ?>
        <div class="container-fluid pb-5">
            <div class="container">
                <div class="row my-5">
                    <div class="col-8">
                        <h1 class="text-center">Área administrativa - Produtos</h1>
                    </div>
                    <div class="col-4">
                        <form action="adminProdutos.php" method="GET">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="busca" placeholder="<?php echo $busca; ?>">
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
                        if($_GET['msg'] == "erroimagem"){?>
                            <div class="alert alert-danger"><span class="font-weight-bold">Erro:</span> formato de imagem desconhecido.</div>
                <?php
                        }else if($_GET['msg'] == "sucesso"){?>
                            <div class="alert alert-success"><span class="font-weight-bold">Mensagem:</span> produto cadastrado/alterado com sucesso!</div>
                <?php
                        }
                    }
                ?>
                <ul class="list-group">
                    <?php
                    $produtoDAO = new ProdutoDAO();
                    $categoriaDAO = new CategoriaDAO();
                    $produtos = $produtoDAO->listar($busca);
                    if(count($produtos) == 0){?>
                        <li class="list-group-item text-center"><h5>Não foram encontrados produtos!</h5></li>
                    <?php 
                    }else{
                        foreach($produtos as $produto){
                    ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <p class="text-center my-1"><img width="100px" height="100px" src="imgProduto/<?php echo $produto['imagem']; ?>"></p>
                                    </div>
                                    <div class="col-12 col-md-8 text-center text-md-left">
                                        <h5 class="font-weight-bold"><?php echo $produto['nome']; ?> - <?php echo $produto['quantidade']; ?> UN.</h5>
                                        <?php $categoria = $categoriaDAO->get($produto['categoria']); ?>
                                        <p><i>[<?php echo $categoria['nome']; ?>]</i></p>
                                        <p><?php echo $produto['descricao']; ?></p>
                                        <h6><?php echo "R$" . number_format($produto['preco'], 2, ',', ''); ?></h6>
                                    </div>
                                    <div class="col-12 col-md-2 text-center text-md-right">
                                        <button type="button" class="btn btn-warning btn-sm alterar" data-toggle="modal" id="alterar" data-target="#modalAlterar">Alterar</button>
                                        <form method="POST" action="php/removerProduto.php"?>
                                            <input type="hidden" name="idproduto" value="<?php echo $produto['id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm mt-2">Remover</button>
                                        </form>
                                        <div class="id" style="display: none;"><?php echo $produto['id']; ?></div>
                                        <div class="nome" style="display: none;"><?php echo $produto['nome']; ?></div>
                                        <div class="descricao" style="display: none;"><?php echo $produto['descricao']; ?></div>
                                        <div class="categoria" style="display: none;"><?php echo $categoria['id'];?></div>
                                        <div class="quantidade" style="display: none;"><?php echo $produto['quantidade'];?></div>
                                        <div class="observacao" style="display: none;"><?php echo $produto['observacao']; ?></div>
                                        <div class="preco" style="display: none;"><?php echo $produto['preco']; ?></div>
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



<!-- ____________________________MODAL CADASTRAR PRODUTO_________________________________ -->
        <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastro" aria-hidden="true">
            <form method="POST" action="php/cadastrarProduto.php" enctype="multipart/form-data" id="cadProd">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFeedback">Cadastrar Produto</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nome">Nome: </label>
                                    <input type="text" class="form-control" id="nome" placeholder="Nome do produto" name="nome" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="descricao">Descrição: </label>
                                    <input type="text" class="form-control" id="descricao" placeholder="Descrição do produto" name="descricao" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-10">
                                    <label for="categoria">Categoria: </label>
                                    <select name="categoria" form="cadProd" id="categoria" class="form-control" required>
                                        <?php
                                        $categoriaDAO = new CategoriaDAO();
                                        $categorias = $categoriaDAO->listar();
                                        if(count($categorias) != 0){
                                            foreach($categorias as $categoria){
                                                ?>
                                                <option value="<?php echo $categoria['id'];?>"> <?php echo $categoria['nome'];?> </option>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div class="form-group col-2">
                                    <label for="addCategoria">Add </label>
                                    <button type="button" id="addCategoria" class="btn btn-success" data-toggle="modal" data-target="#modalAddCategoria"><b>+</b></button>
                                </div>
                            </div>
                                
                            <div class="row"> 
                                <div class="form-group col-12">
                                    <label for="observacao">Observação: </label>
                                    <input type="text" class="form-control" id="observacao" placeholder="Observação do produto" name="observacao" required>
                                </div>
                            </div>   

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="preco">Preço: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">R$</div>
                                        </div>
                                        <input type="number" class="form-control" id="preco" min="0.00" step="0.01" placeholder="0,00" name="preco" required>
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="quantidade">Quantidade: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">UN</div>
                                        </div>
                                        <input type="number" class="form-control" id="quantidade" min="0.00" step="1.00" placeholder="0" name="quantidade" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="imagem">Imagem: </label>
                                    <input type="file" class="form-control-file" id="imagem" name="imagem" accept="image/*">
                                </div>
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

<!-- ____________________________MODAL ALTERAR PRODUTO_________________________________ -->
        <div class="modal fade" id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="modalAlterar" aria-hidden="true">
            <form method="POST" action="php/atualizarProduto.php" enctype="multipart/form-data" id="altProd">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFeedback">Alterar Produto</h5>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nome">Nome: </label>
                                    <input type="text" class="form-control" id="nome" placeholder="Nome do produto" name="nome" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="descricao">Descrição: </label>
                                    <input type="text" class="form-control" id="descricao" placeholder="Descrição do produto" name="descricao" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-10">
                                    <label for="categoria">Categoria: </label>
                                    <select name="categoria" form="altProd" id="categoria" class="form-control"required>
                                        <?php
                                        $categoriaDAO = new CategoriaDAO();
                                        $categorias = $categoriaDAO->listar();
                                        if(count($categorias) != 0){
                                            foreach($categorias as $categoria){
                                                ?>
                                                <option value="<?php echo $categoria['id'];?>" > <?php echo $categoria['nome'];?> </option>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div class="form-group col-2">
                                    <label for="addCategoria">Add </label>
                                    <button type="button" id="addCategoria" class="btn btn-success" data-toggle="modal" data-target="#modalAddCategoria"><b>+</b></button>
                                </div>
                            </div>
                                
                            <div class="row"> 
                                <div class="form-group col-12">
                                    <label for="observacao">Observação: </label>
                                    <input type="text" class="form-control" id="observacao" placeholder="Observação do produto" name="observacao" required>
                                </div>
                            </div>   

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="preco">Preço: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">R$</div>
                                        </div>
                                        <input type="number" class="form-control" id="preco" min="0.00" step="0.01" placeholder="0,00" name="preco" required>
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="quantidade">Quantidade: </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">UN</div>
                                        </div>
                                        <input type="number" class="form-control" id="quantidade" min="0.00" step="1.00" placeholder="0" name="quantidade" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="imagem">Imagem: </label>
                                    <input type="file" class="form-control-file" id="imagem" name="imagem" accept="image/*">
                                </div>
                            </div>

                        </div>
                        <input type="hidden" id="id" name="id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-warning">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="modalAddCategoria" aria-labelledby="modalAddCategoria" aria-hidden="true">
            <form method="POST" action="php/cadastrarCategoria.php" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFeedback">Cadastrar Categoria</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                            <div class="form-group col-12">
                                <label for="nome">Nome: </label>
                                <input type="text" class="form-control" id="nome" placeholder="Categoria" name="nome" required>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-warning">Enviar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>