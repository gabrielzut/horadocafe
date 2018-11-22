<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <link rel="stylesheet" type="text/CSS" href="css/estilo.css">
  <link rel="icon" href="favicon.png" />
</head>
<body>
	<form action="php/cadastrarUsuario.php" method="POST">
      <div class="container h-100">
   	    <div class="row h-100 justify-content-center align-items-center">
      		<div class="col-4 border border-primary rounded mt-3">
                <h2 class="titles text-center mt-4">Cadastro</h2>
                <div class="modal-body">		
                  <div class="form-group">
                    <label for="name" class="col-form-label">Nome</label>
                    <input type="text" class="form-control" id="name" placeholder="Nome de exibição" name="nome">
                  </div>

                  <div class="form-group">
                    <label for="emailcadastro" class="col-form-label">E-mail</label>
                    <input type="email" class="form-control" id="emailcadastro" placeholder="Email" name="email">
                  </div>

                  <div class="form-group">
                    <label for="senhacadastro" class="col-form-label">Senha</label>
                    <input type="password" class="form-control" id="senhacadastro" placeholder="Senha" name="senha">
                  </div>

                  <div class="form-group">
                    <label for="confirmar" class="col-form-label">Confirmar senha</label>
                    <input type="password" class="form-control" id="confirmar" placeholder="Confirmar senha" name="confirmar">
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </div>
      </div>
    </form>	

</body>
</html>