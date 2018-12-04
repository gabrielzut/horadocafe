<?php
    require "verificaLogin.php";
    verificaLogin();
    
    require "conn.php";
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    session_destroy();
    header('location:../index.php');
?>