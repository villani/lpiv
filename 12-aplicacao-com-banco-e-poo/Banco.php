<?php

class Banco
{
    private $dsn = 'sqlite:empresa.sqlite';
    protected $pdo;
    
    public function conectar()
    {
        $this->pdo = new PDO($this->dsn);
    }
}