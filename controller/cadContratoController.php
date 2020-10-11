<?php
# SCRIPT DE VALIDAÇÃO DE CADASTRO DE CONTRATO 
require('../model/dao/Conexao.php'); 
require('../model/dao/ContratoDao.php');
require '../model/entidades/Contrato.php';

//session_start(); # Já está sendo iniciado no 'ContratoDao'

// RECEBENDO DADOS DA VIEW:
$cadContratoLct = $_POST['cadContratoLct'];
$cadContratoEmp = $_POST['cadContratoEmp'];
$cadContratoCod = $_POST['cadContratoCod'];
$cadContratoVT = $_POST['cadContratoVT'];  # Validar (virgula, Float, )
$cadContratoVM = $_POST['cadContratoVM'];   # Validar (virgula, Float, )
$cadContratoAdt = $_POST['cadContratoAdt']; # Validar (Inteiro)
$cadContratoParcelas = $_POST['cadContratoParcelas']; # Validar ( Inteiro )
$cadContratoDTinicial = $_POST['cadContratoDTinicial'];  # Validar ( Data )
$cadContratoDTfinal = $_POST['cadContratoDTfinal'];     # Validar ( Data )

// Validando os dados: FAZER DEPOIS  *Campo em branco não está cadastrando registro, mesmo sem ser not null


//print_r($_POST);
$resultado = null;
$contrato = new Contrato(null, $cadContratoLct, $cadContratoEmp, $cadContratoCod, $cadContratoVT, $cadContratoVM,
                        $cadContratoAdt, $cadContratoParcelas, $cadContratoDTinicial, $cadContratoDTfinal);

//$_SESSION['contrato'] = $contrato;
try{
    $conexao = conectar();
    $resultado = salvarContrato($conexao, $contrato);
    echo 'Resultado:'.$resultado;
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

// Logica de redirecionamento:
if($resultado == 1){
    header('Location: ../cad_contrato.php?contrato=efetuado');
  }else{
    header('Location: ../cad_contrato.php?contrato=nao_efetuado');
  }
 


?>