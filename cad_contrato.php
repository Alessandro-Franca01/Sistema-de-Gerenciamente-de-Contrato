<?php
// SCRIPT DA PAGINA DE CADASTRO DE CONTRATO

session_start();


?>

<html>
                <!-- Ajustar esse codigo para ficar responsivo mobile/notebook -->  
  <head>
    <meta charset="utf-8" />
    <!-- Depois que apliquei essa meta ficou responsivo sem usar a referencia 'sm' -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <link rel="shortcut icon" href="./img/icone_ipsemc.png" > 
    <title>Gerenciamento de Contratos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>
        function acao(){
          alert('Paciente Cadastrado')
        }
    </script>

  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark ">
    <a class="navbar-brand" href="#">
      <img src="./img/icone_ipsemc.png" width="40" height="40" >
        <span class="ml-2"> Cadastrar Contrato </span>
      </a>
      <a href="./menu.php">
        <button class="btn btn-outline-secondary" type="button">Voltar</button>
      </a>
      </nav>        
    <form action="./controller/cadContratoController.php" method="post">
        <div class="form-group">
          <label for="id_cadContratoLct"> Licitação</label>
          <input type="text" class="form-control" name="cadContratoLct" id="id_cadContratoLct" placeholder="CC 0000/00">
          <small id="small_pacinete" class="form-text text-muted ">Campo obrigatória </small>
        </div>                 
        <div class="form-group">
            <label for="id_cadContratoEmp"> Contratada</label>
            <input type="text" class="form-control" name="cadContratoEmp" id="id_cadContratoEmp" placeholder="Empresa Contratada">
            <small id="help_respon" class="form-text text-muted">*Campo não obrigatorio </small>
        </div>    
        <div class="form-group">
            <label for="id_cadContratoCod">Contrato </label>
            <input type="text" class="form-control" name="cadContratoCod" id="id_cadContratoCod" placeholder="Código do Contrado">
            <small id="help_respon" class="form-text text-muted">*Campo não obrigatorio </small>
        </div>    
        <div class="form-group">
            <label for="id_cadContratoVT"> Valor Total </label>
            <input type="text" class="form-control" name="cadContratoVT" id="id_cadContratoVT">
            <small id="help_respon" class="form-text text-muted">*Campo não obrigatorio </small>
        </div> 
        <div class="form-group">
            <label for="id_cadContratoVM"> Valor Mensal </label>
            <input type="text" class="form-control" name="cadContratoVM" id="id_cadContratoVM">
            <small id="help_respon" class="form-text text-muted">*Campo não obrigatorio </small>
        </div>   
        <div class="form-group">
            <label for="id_cadContratoAdt"> Adtivo </label>
            <input type="text" class="form-control" name="cadContratoAdt" id="id_cadContratoAdt">
            <small id="help_respon" class="form-text text-muted">*Campo não obrigatorio </small>
        </div> 
        <div class="form-group">
            <label for="id_cadContratoParcelas"> Parcelas </label>
            <input type="text" class="form-control" name="cadContratoParcelas" id="id_cadContratoParcelas">
            <small id="help_respon" class="form-text text-muted">*Campo não obrigatorio </small>
        </div>               
        <div class="form-group">
            <label for="id_cadContratoDTinicial">Data de Início</label>
            <input type="date" class="form-control" name="cadContratoDTinicial" id="id_cadContratoDTinicial">
        </div>
        <div class="form-group">
            <label for="id_cadContratoDTfinal">Data de Término</label>
            <input type="date" class="form-control" name="cadContratoDTfinal" id="id_cadContratoDTfinal">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-secundary">Cancelar</button>
    </form>
    
    <script>
      // Script da mensaguem de validação: FUNCINONADO!
        var url_string = window.location.href;
        var url = new URL(url_string);
        if (url.searchParams.get("contrato") != null){
          var getParamtroCadastro = url.searchParams.get("contrato");

          if(getParamtroCadastro == "efetuado"){
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("Contrato registrado com sucesso!");
          }
          if(getParamtroCadastro == "nao_efetuado"){ 
            console.log(url); 
            console.log(getParamtroCadastro);
            alert(" NÃO foi possível registrar o contrato.");
          }
          else{
            // NÃO É PARA ENTRAR AQUI!
            console.log(url); 
            console.log(getParamtroCadastro);
          }          
        }
    </script>
  </body>
</html>