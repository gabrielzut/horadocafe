<?php 
    require($_SERVER['DOCUMENT_ROOT'] . "/horadocafe/php/conn.php");

    class CategoriaDAO{
        function insert($categoria){
            $conexao = conectar();
            $query = "INSERT INTO categoria(nome) VALUES (?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$categoria['nome']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar(){
            $conexao = conectar();
            $query = "SELECT * FROM categoria WHERE id != 1;";
            $stmt = mysqli_prepare($conexao,$query);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($id){
            $conexao = conectar();
            $query = "SELECT * FROM Categoria WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }

        function lastId(){
            $conexao = conectar();
            $query = "SELECT auto_increment FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'categoria';";
            $stmt = mysqli_prepare($conexao,$query);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }
    }
?>