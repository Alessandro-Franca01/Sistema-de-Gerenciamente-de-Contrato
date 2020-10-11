<?php
# INICIAR A APLICAÇÃO DO PROJETO DE DARCIO 

// DESTRUINDO A SESSÃO PARA INICIAR OUTRA DO ZERO!
//session_destroy();

// INICIANDO OUTRA SESSION NOVA: TESTANDO!
session_start();
if(!isset($_GET['login']) ){
  $_SESSION['validacao'] = false;

}

?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Gerenciamento de Contratos</title> 
    <!-- Colocando icone ao lado do titulo da pagina -->
    <link rel="shortcut icon" href="./img/icone_ipsemc.png" >  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>
      // Começar a implementação dos codigos em java script na aplicação:
        function validacao(){
          
        }
    </script>

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
    
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark ">
      
      <a class="navbar-brand" href="#">
        <img src="./img/icone_ipsemc.png" width="40" height="40" >
        Formulario de Login
      </a>
    </nav>

    <div class="container">    
      <div class="row">
        <div class="card-login mt-5">
          <div class="card">
            <div class="card-header">
            <h5 class="card-title"> Entre com seus dados: </h5>
            </div>
            <div class="card-body">   
              <form action="./controller/UserController.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>

                </button>                
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>

