<?php
# Script do novo modelo do banco de dados

// Conectando com o banco e retornando uma instancia de PDO
function conectar(){
    // Variaveis de conexao
    $dns = 'mysql:host=localhost;dbname=sistema_darcil';
    $user = 'root';
    $senha = null; 

    $conexao = new PDO($dns, $user, $senha);
    return $conexao;
}

/*// Implementar depois:
function encerrarConexao($conexao){
    # codigo de encerramento da conexao!
}*/



?>