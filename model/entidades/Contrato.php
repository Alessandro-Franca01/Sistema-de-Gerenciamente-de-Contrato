<?php
#SCRIPT DA CLASS CONTRATO:

# A interface não esta importanto na pagina de listagem
//require './services/ContratoService.php';

class Contrato{

    private $id = null; 
    private $licitacao = null;
    private $contratada = null;
    private $contrato = null;
    private $valorTotal = null;
    private $valorMensal = null;
    private $adtivo = null;
    private $parcelas = null;
    private $dataInicial = null;
    private  $dataFinal = null;    

    //Metodo construtor da classe: Passando todos os atrbutos
    function __construct($id, $licitacao, $contratada, $contrato, $valorTotal, $valorMensal, $adtivo, $parcelas,
                        $dataInicial, $dataFinal){

        $this->id = $id;
        $this->licitacao = $licitacao;
        $this->contratada = $contratada;
        $this->contrato = $contrato;
        $this->valorTotal = $valorTotal;
        $this->valorMensal = $valorMensal;
        $this->adtivo = $adtivo;
        $this->parcelas = $parcelas;
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
    }

    // Unico set e get generico:    
    function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    function __get($atributo){
        return $this->$atributo;
    }
    
    // Metodo toString
    function toString(){
        echo "ID: $this->id, licitacao: $this->licitacao, contratada: $this->contratada, contrato: $this->contrato,
                valorTotal: $this->valorTotal, valorMensal: $this->valorMensal, adtivo: $this->adtivo, parcelas: $this->parcelas,
                dataInicial: $this->dataInicial, dataFinal: $this->dataFinal";
    }

    // Tenho que rever esse metodo: FUNCIONANDO **Alteração da classe implementado na pagina de front-end
    function avisarPrazoExpiracao(DateTime $dataAtual){
        $dataFinalDT = new DateTime($this->dataFinal);        
        $prazo = $dataAtual->diff($dataFinalDT);
        
        if($prazo->m < 3){
            $aviso = 'para expirar';
            $class = 'text-danger';
            //$this->classAviso = 'text-success'; // *NAO ESTA ALTERANDO O ATRIBUTO
            //$this->__set('classAviso', 'text-danger');  // *NAO ESTA ALTERANDO O ATRIBUTO

        }
        elseif(($prazo->m == 3) and ($prazo->d == 0)){
            $aviso = 'para expirar';
            $class = 'text-danger';            
        }
        else{
            $aviso = 'em vigencia';
            $class = 'text-success';        
        }
        $this->classAviso = $class;   // *NAO ESTA ALTERANDO O ATRIBUTO
        return $aviso;
    }


    
}



?>