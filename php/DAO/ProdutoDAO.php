<?php 
    require "../conn.php";

    class ProdutoDAO{
        function insert($produto){
            $conexao = conectar();
            $query = "INSERT INTO Produto(nome,descricao,quantidade,imagem) VALUES (?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ssis",$produto['nome'],$produto['descricao'],$produto['quantidade'],$produto['imagem']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($produto){
            $conexao = conectar();
            $query = "UPDATE Produto SET nome = ?, descricao = ?, quantidade = ?, imagem = ? WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"ssisi",$produto['nome'],$produto['descricao'],$produto['quantidade'],$produto['imagem'],$produto['id']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function remove($id){
            $conexao = conectar();
            $query = "DELETE FROM Produto WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar(){
            $conexao = conectar();
            $query = "SELECT * FROM Produto;";
            $stmt = mysqli_prepare($conexao,$query);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($id){
            $conexao = conectar();
            $query = "SELECT * FROM Produto WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }

        function lastId(){
            $conexao = conectar();
            $query = "SELECT auto_increment FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'produto';";
            $stmt = mysqli_prepare($conexao,$query);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }
    }
?>