<?php 
    require "../conn.php";

    class PedidoDAO{
        function insert($pedido){
            $conexao = conectar();
            $query = "INSERT INTO Pedido(emailUsuario,idProduto,quantidade,data) VALUES (?,?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"siis",$pedido['emailUsuario'],$pedido['idProduto'],$pedido['quantidade'],$pedido['data']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function update($pedido){
            $conexao = conectar();
            $query = "UPDATE Pedido SET quantidade = ?, data = ? WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"isi",$pedido['quantidade'],$pedido['data'],$pedido['id']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function remove($id){
            $conexao = conectar();
            $query = "DELETE FROM Pedido WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function listar(){
            $conexao = conectar();
            $query = "SELECT * FROM Pedido;";
            $stmt = mysqli_prepare($conexao,$query);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }

        function get($id){
            $conexao = conectar();
            $query = "SELECT * FROM Pedido WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"i",$id);
            $resultado = executar_SQL($conexao,$stmt);
            desconectar($conexao);

            return lerResultado($resultado);
        }
    }
?>