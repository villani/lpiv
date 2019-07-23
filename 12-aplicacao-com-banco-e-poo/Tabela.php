<?php

class Tabela extends Banco
{
    private $nome;
    
    public function __construct($nome) 
    {
        $this->nome = $nome;
        $this->conectar();
    }
    
    public function obterRegistros()
    {
        $instrucao = $this->pdo->query("SELECT rowid, * FROM $this->nome");
        return $instrucao->fetchAll();
    }
    
    public function inserir($valores)
    {
        $sql = "INSERT INTO $this->nome VALUES (?";
        for ($i = 1; $i < count($valores); $i++) {
            $sql .= ',?';
        }
        $sql .= ')';
        
        $instrucao = $this->pdo->prepare($sql);
        
        for ($i = 0; $i < count($valores); $i++) {
            $instrucao->bindParam(($i+1), $valores[$i]);
        }
        
        return $instrucao->execute();
    }
    
    public function excluir($id)
    {
        $sql = "DELETE FROM $this->nome WHERE rowid=:id";
        $instrucao = $this->pdo->prepare($sql);
        $instrucao->bindParam(':id', $id);
        return $instrucao->execute();
    }
    
    public function __get($name)
    {
        return $this->$name;
    }
}