<?php

class Cliente {

    //criar os atributos
    public $nome;
    public $cpf;
    public $saldo;
    public $limite;
    public $nConta;

    //declarar os métodos
    function setClass($nome,$cpf,$saldo,$limite,$nConta){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->saldo = $saldo;
        $this->limite = $limite;
        $this->nConta = $nConta;
        
    }


    function sacar ($valor){
        if ($valor>$this->saldo+$this->limite){
            echo "Excedeu o limite permitido para saque<br>";
        }else{
        $this->saldo = $this->saldo- $valor;
        }

    }
    function saldo(){
        return "Saldo de {$this->saldo} da conta {$this->nConta}<br>";
    }
        
    function depositar($valor){
        $this->saldo = $this->saldo + $valor;
    }

    function transferir(){}

}