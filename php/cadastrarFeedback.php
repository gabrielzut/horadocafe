<?php
    require "DAO/FeedbackDAO.php";

    session_start();

    $feedback['emailUsuario'] = $_SESSION['email'];
    $feedback['idProduto'] = $_POST['idProduto'];
    $feedback['nota'] = $_POST['nota'];
    $feedback['feedback'] = $_POST['feedback'];

    $FeedbackDAO = new FeedbackDAO();
    $FeedbackDAO->insert($feedback);

    header('Location:../feedback.php');
?>