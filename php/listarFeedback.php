<?php
    require "DAO/FeedbackDAO.php";
    
    $feedbackDAO = new FeedbackDAO();
    $feedbacks = $feedbackDAO->listar($_GET['id']);

    foreach($feedbacks as $feedback){
        echo "";
    }
?>