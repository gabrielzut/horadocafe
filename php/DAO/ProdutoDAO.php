<?php 
    require($_SERVER['DOCUMENT_ROOT'] . "/horadocafe/php/conn.php");

    class ProdutoDAO{
        function insert($produto){
            $conexao = conectar();
            $query = "INSERT INTO Produto(nome,observacao,descricao,preco,imagem) VALUES (?,?,?,?,?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"sssds",$produto['nome'],$produto['observacao'],$produto['descricao'],$produto['preco'],$produto['imagem']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function updateProduto($produto){
            $conexao = conectar();
            $query = "UPDATE Produto SET nome = ?, observacao = ?, descricao = ?, preco = ? WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"sssdi",$produto['nome'],$produto['observacao'],$produto['descricao'],$produto['preco'],$produto['id']);
            executar_SQL($conexao,$stmt);
            desconectar($conexao);
        }

        function updateImagem($produto){
            $conexao = conectar();
            $query = "UPDATE Produto SET imagem = ? WHERE id = ?;";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"si",$produto['imagem'],$produto['id']);
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

        function listar($busca){
            $conexao = conectar();
            $busca = "%" . $busca . "%";
            $query = "SELECT * FROM Produto WHERE UPPER(nome) LIKE UPPER(?);";
            $stmt = mysqli_prepare($conexao,$query);
            mysqli_stmt_bind_param($stmt,"s",$busca);
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