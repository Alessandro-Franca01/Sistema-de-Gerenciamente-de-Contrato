<?php
# SCRIPT DA CLASS CONTRATO NA CAMADA DAO

// Inserir registro de Contrato no banco:  FUNCIONANDO, Nao esta inserindo registro com campo em branco!
function salvarContrato(PDO $conexao, Contrato $contrato){
    $sql = "INSERT INTO contrato(licitacao, contratada, contrato, valor_total, valor_mensal, adtivo, parcelas, 
        data_inicial, data_final) VALUES('{$contrato->__get('licitacao')}', '{$contrato->__get('contratada')}',
            '{$contrato->__get('contrato')}',{$contrato->__get('valorTotal')}, {$contrato->__get('valorMensal')},
            {$contrato->__get('adtivo')}, {$contrato->__get('parcelas')}, '{$contrato->__get('dataInicial')}',
            '{$contrato->__get('dataFinal')}')";
    echo $sql.'<br>';
    $stm = $conexao->prepare($sql);
    $resultado = $stm->execute(); // NAO ESTÁ INSERINDO!
    return $resultado; 
}

function buscarTodosContratos(PDO $conexao){
    $sql = "SELECT * FROM contrato";
    $resultado = $conexao->query($sql);
    $consulta = $resultado->fetchAll(PDO::FETCH_ASSOC); // Só vai receber o array list associativo 
    return $consulta; 
}

?>