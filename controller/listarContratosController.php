<?php
# SCRIPT DA LOGICA DA LISTAGEM DO BANCO DE DADOS

//  Includes:
require('../model/dao/Conexao.php'); 
require('../model/dao/ContratoDao.php');
require '../model/entidades/Contrato.php';

// Iniciando a sessao:
session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

//$origin = $_GET['remover_pct'];

# Arrays e Variaveis:
$listaContratos = array();
$redirecionamento = false;

// Abrindo conexao com o banco de dados:
try{
    $conexao = conectar();
    $listaContratos = buscarTodosContratos($conexao); # Funcionando!
    $redirecionamento = true;
    $_SESSION['listaDeContrato'] = $listaContratos;     
    //var_dump($listaContratos); 
    
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

// Logica de redirecionamento: ../lista_pacientes2.php?remocao=removido
if($redirecionamento == true){
  header('Location: ../listar_contratos.php');
}else{
  header('Location: ../menu.php?exibir=nao_encontrado');
}

?>

