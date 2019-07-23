<?php

class Pessoa 
{

    private $nome;
    private $idade;
    private $altura;
    
    public function __get($atributo) {
        return $this->$atributo;
    }
    
    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
    
    public function __construct($nome = 'Padrão', $idade = 0) {
        $this->nome = $nome;
        $this->idade = $idade;
    }
    
    public function __destruct() {
        print "<p>Um objeto do tipo " . __CLASS__ . " foi removido da "
                . "memória</p>";
    }

    /**
     * Altera a idade da pessoa.
     * @param type $idade Novo valor de idade.
     */
    public function fazerAniversario($idade) 
    {
        $this->idade = $idade;
    }

    /**
     * Altera a altura da pessoa.
     * @param type $altura Altura a ser acrescida na altura atual.
     */
    public function crescer($altura) 
    {
        $this->altura += $altura;
    }

}
