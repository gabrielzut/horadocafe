<?php
    function verificaLogin(){
        session_start();
        if(!(isset($_SESSION['email'])) || !(isset($_SESSION['senha']))){
            header('Location: ./index.php?msg=negadouser');
        }
    }

    function verificaAdmin(){
        session_start();
        if((!(isset($_SESSION['email'])) || !(isset($_SESSION['senha'])))&&!(isset($_SESSION['admin']))){
            header('Location: ./index.php?msg=negadouser');
        }else if($_SESSION['admin'] != 1){
            header('Location: ./index.php?msg=negadoadmin');
        }
    }
?>