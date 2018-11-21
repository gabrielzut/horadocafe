<?php
    require "DAO/FeedbackDAO.php";

    session_start();

    $feedback['emailUsuario'] = $_SESSION['email'];
    $feedback['idProduto'] = $POST['idProduto'];
    $feedback['nota'] = $POST['nota'];
    $feedback['feedback'] = $POST['feedback'];

    $FeedbackDAO = new FeedbackDAO();
    $FeedbackDAO->insert($feedback);

    header('Location:../feedback.php');
?>