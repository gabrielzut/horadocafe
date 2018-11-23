<?php
    require "DAO/FeedbackDAO.php";

    $idProduto = $_POST['idProduto'];
    $emailUsuario = $_POST['emailUsuario'];

    $feedbackDAO = new FeedbackDAO();

    $feedbackDAO->remove($idProduto,$emailUsuario);

    header('Location:../detalhes.php?id=' . $idProduto);
?>