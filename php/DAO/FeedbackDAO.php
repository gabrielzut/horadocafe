<?php 
    require "../conn.php";

    class FeedbackDAO{
        function insert($feedback){
            $conexao = conectar();
            $query = "INSERT INTO Feedback(idProduto,emailUsuario,nota,feedback) VALUES (?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"isiss",$feedback['idProduto'],$feedback['emailUsuario'],$feedback['nota'],$feedback['feedback']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($pedido){
            $conexao = conectar();
            $query = "UPDATE Feedback SET nota = ?, feedback = ?, resposta = ? WHERE idProduto = ? AND emailUsuario = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"issis",$feedback['nota'],$feedback['feedback'],$feedback['resposta'],$feedback['idProduto'],$feedback['emailUsuario']);
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

        function listar(){
            $conexao = conectar();
            $query = "SELECT * FROM Feedback;";
            $stmt = mysqli_prepare($conexao,$query);
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

            return lerResultado($resultado);
        }
    }
?>