<?php
    require "verificaLogin.php";
    verificaAdmin();
    
    if(isset($_FILES['imagem1']) && !empty($_FILES['imagem1']['name'])){
        $imagem = $_FILES['imagem1'];

        if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){   
            $nomeTemp = $imagem['tmp_name'];

            move_uploaded_file($nomeTemp, '../img/slide1.jpg');
        } else {
            header('Location:../index.php?msg=erroImagem');
            exit;
        }
    }

    if(isset($_FILES['imagem2']) && !empty($_FILES['imagem2']['name'])){
        $imagem = $_FILES['imagem2'];

        if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){   
            $nomeTemp = $imagem['tmp_name'];

            move_uploaded_file($nomeTemp, '../img/slide2.jpg');
        } else {
            header('Location:../index.php?msg=erroImagem');
            exit;
        }
    }

    if(isset($_FILES['imagem3']) && !empty($_FILES['imagem3']['name'])){
        $imagem = $_FILES['imagem3'];

        if($imagem['type'] == "image/jpg" || $imagem['type'] == "image/jpeg" || $imagem['type'] == "image/png" || $imagem['type'] == "image/gif" || $imagem['type'] == "image/bmp"){   
            $nomeTemp = $imagem['tmp_name'];

            move_uploaded_file($nomeTemp, '../img/slide3.jpg');
        } else {
            header('Location:../index.php?msg=erroImagem');
            exit;
        }
    }

    sleep(4);
    header('Location:../index.php?msg=sucessoImagem');
?>