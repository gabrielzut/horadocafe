<?php
    function verificaLogin(){
        session_start();
        if(!(isset($_SESSION['email'])) || !(isset($_SESSION['senha']))){
            header('Location: ' . $_SERVER['DOCUMENT_ROOT'] . '/horadocafe/index.php?msg=negadoUser');
        }
    }

    function verificaAdmin(){
        session_start();
        if((!(isset($_SESSION['email'])) || !(isset($_SESSION['senha'])))&&!(isset($_SESSION['admin']))){
            header('Location: ' . $_SERVER['DOCUMENT_ROOT'] . '/horadocafe/index.php?msg=negadoUser');
        }else if($_SESSION['admin'] != 1){
            header('Location: ' . $_SERVER['DOCUMENT_ROOT'] . '/horadocafe/index.php?msg=negadoAdmin');
        }
    }
?>