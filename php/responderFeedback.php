<?php
    require "DAO/FeedbackDAO.php";

    $feedback['idProduto'] = $_POST['idProduto'];
    $feedback['emailUsuario'] = $_POST['emailUsuario'];
    $feedback['nota'] = $_POST['nota'];
    $feedback['feedback'] = $_POST['feedback'];
    $feedback['resposta'] = $_POST['resposta'];

    $feedbackDAO = new FeedbackDAO();
    $feedback->update($feedback);

    header('Location:adminFeedback.php');
?>