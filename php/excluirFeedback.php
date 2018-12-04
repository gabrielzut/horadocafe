<?php
    require "verificaLogin.php";
    verificaLogin();
    
    require "DAO/FeedbackDAO.php";

    $idProduto = $_POST['idProduto'];
    $emailUsuario = $_POST['emailUsuario'];

    $feedbackDAO = new FeedbackDAO();

    $feedbackDAO->remove($idProduto,$emailUsuario);

    if(isset($_POST['cantina'])){
        header('Location:../sobre.php');
    }else{
        header('Location:../detalhes.php?id=' . $idProduto);
    }
?>