<?php 
    require($_SERVER['DOCUMENT_ROOT'] . "/horadocha/php/conn.php");

    class FeedbackDAO{
        function insert($feedback){
            $conexao = conectar();
            $query = "INSERT INTO Feedback(idProduto,emailUsuario,nota,feedback) VALUES (?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"isis",$feedback['idProduto'],$feedback['emailUsuario'],$feedback['nota'],$feedback['feedback']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($feedback){
            $conexao = conectar();
            $query = "UPDATE Feedback SET nota = ?, feedback = ? WHERE idProduto = ? AND emailUsuario = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"isis",$feedback['nota'],$feedback['feedback'],$feedback['idProduto'],$feedback['emailUsuario']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function remove($idProduto,$emailUsuario){
            $conexao = conectar();
            $query = "DELETE FROM Feedback WHERE idProduto = ? AND emailUsuario = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"is",$idProduto,$emailUsuario);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar($idProduto){
            $conexao = conectar();
            $query = "SELECT * FROM Feedback WHERE idProduto = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$idProduto);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function listarRandom($idProduto){
            $conexao = conectar();
            $query = "SELECT * FROM Feedback WHERE idProduto = ? ORDER BY RAND() LIMIT 5;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$idProduto);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($idProduto,$emailUsuario){
            $conexao = conectar();
            $query = "SELECT * FROM Feedback WHERE idProduto = ? AND emailUsuario = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"is",$idProduto,$emailUsuario);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado)[0];
        }
    }
?>