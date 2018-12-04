<?php
    require "verificaLogin.php";
    verificaLogin();
    
    require "DAO/FeedbackDAO.php";

    session_start();

    $feedback['emailUsuario'] = $_SESSION['email'];
    $feedback['idProduto'] = $_POST['idProduto'];
    $feedback['nota'] = $_POST['nota'];
    $feedback['feedback'] = $_POST['feedback'];

    $feedbackDAO = new FeedbackDAO();

    if($feedbackDAO->get($feedback['idProduto'],$feedback['emailUsuario']) !== null){
        $feedbackDAO->update($feedback);
    }else{
        $feedbackDAO->insert($feedback);
    }

    if(isset($_POST['cantina'])){
        header('Location:../sobre.php');
    }else{
        header('Location:../detalhes.php?id=' . $feedback['idProduto']);
    }
?>