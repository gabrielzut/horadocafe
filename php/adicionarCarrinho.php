<?php
    $idproduto = $_POST['idproduto'];
    $quantidade = $_POST['quantidade'];

    session_start();

    $_SESSION['produtos'][$idproduto]['quantidade'] = $quantidade;
    $_SESSION['produtos'][$idproduto]['idproduto'] = $idproduto;

    header('Location: ../carrinho.php');
?>