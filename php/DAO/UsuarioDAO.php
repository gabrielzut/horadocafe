<?php 
    require "conn.php";

    class UsuarioDAO{
        function insert($usuario){
            $conexao = conectar();
            $query = "INSERT INTO Usuario(email,nome,senha) VALUES (?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"sss",$usuario['email'],$usuario['nome'],$usuario['senha']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($usuario){
            $conexao = conectar();
            $query = "UPDATE Usuario SET nome = ?, senha = ? WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"sss",$usuario['nome'],$usuario['senha'],$usuario['email']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function remove($email){
            $conexao = conectar();
            $query = "DELETE FROM Usuario WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$email);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar(){
            $conexao = conectar();
            $query = "SELECT * FROM Usuario;";
            $stmt = mysqli_prepare($conexao,$query);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($email){
            $conexao = conectar();
            $query = "SELECT * FROM Usuario WHERE email = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$email);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }

        function login($email,$senha){
            $conexao = conectar();
            $query = "SELECT * FROM Usuario WHERE email = ? AND senha = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$email);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            $senhabanco = md5(lerResultado($resultado)[0]['senha']);

            if($senha != $senhabanco){
                return false;
            }else{
                return true;
            }
        }
    }
?>