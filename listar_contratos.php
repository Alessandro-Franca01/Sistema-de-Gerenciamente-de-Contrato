<?php
# SCRIPT da Pagina de listagem de paciente USANDO TABELA NO LUGAR DE CARDS!!!

// Dando erro no require mais uma vez!
require './model/entidades/Contrato.php';

session_start();

// Setando o TimeZone:
date_default_timezone_set('America/Recife');
// Recebendo a data no momento de execução
$dataAtual = new DateTime('2020-10-03');

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

$listaContrato = $_SESSION['listaDeContrato'];
#print_r($listaContrato);
#echo '<hr>';

?>


<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Gerenciamento de Contratos</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--  TESTANDO CODIGO DO W3Scholl -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-light bg-light">      
      <a class="navbar-brand" href="#">
        
        <img src="./img/icone_ipsemc.png" width="40" height="40" >
        Lista de Contratos
      </a>
      <a href="./menu.php">
        <button class="btn btn-outline-secondary" type="button">Voltar</button>
      </a>
    </nav>    
    <div class="table-reponsive-sm">   
        <table class="table text-center">
        <!-- Ja está bem o formato do layout da tabela para pc -->
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Licitacao</th>
                    <th scope="col">Contratada</th>                                      
                    <th scope="col">Contrato</th>                
                    <th scope="col">Valor Total</th>
                    <th scope="col">Valor Mensal</th>
                    <th scope="col">Adtivo</th>
                    <th scope="col">Parcelas</th>                                      
                    <th scope="col">Inicio</th>
                    <th scope="col">Termino</th>
                    <th scope="col">Prazo </th>                        
                </tr>
            </thead>    
            <?php foreach($listaContrato as $contrato) { 
              // Instaciando os contratos: TESTANDO...
              $objContrato = new Contrato($contrato['IDContrato'], $contrato['licitacao'], $contrato['contratada'],
                  $contrato['contrato'], $contrato['valor_total'], $contrato['valor_mensal'], $contrato['adtivo'],
                  $contrato['parcelas'], $contrato['data_inicial'], $contrato['data_final']);
              //$objContrato->__set('classAviso', 'text-success'); # AQUI DEU CERTO!
              ?>         
            <tbody>
                <tr>
                    <th scope="row"> <?php echo $contrato['IDContrato']; ?> </th>            
                        <td> <?php echo $contrato['licitacao']; ?> </td>
                        <td> <?php echo $contrato['contratada']; ?></td>
                        <td> <?php echo $contrato['contrato']; ?> </td>
                        <td> <?php echo $contrato['valor_total']; ?></td>
                        <td> <?php echo $contrato['valor_mensal']; ?> </td>
                        <td> <?php echo $contrato['adtivo']; ?> </td>
                        <td> <?php echo $contrato['parcelas']; ?> </td>
                        <td> <?php echo $contrato['data_inicial']; ?> </td>
                        <td> <?php echo $contrato['data_final']; ?> </td>
                        <?php
                          # FUNCIONANDO NORMALMENTE!
                          $classTexto = null;
                          $aviso = $objContrato->avisarPrazoExpiracao($dataAtual);
                          if($aviso == 'para expirar'){
                              $classeText = 'text-danger';
                          }else{
                              $classeText = 'text-success';
                          }
                        ?>
                        <td class= "<?php echo $classeText ?>">
                            <?php echo $aviso ?>
                        </td>
                </tr>
            </tbody> 
            <?php } ?>          
        </table> 
    </div>
    <!-- Optional JavaScript // <?php # echo $objContrato->avisarPrazoExpiracao($dataAtual); ?> -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html