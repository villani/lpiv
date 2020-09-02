<?php

class Carro 
{
    
    protected $modelo;
    private $motor;
    private $ano;
    
    public static $qtdeCarros;
    
    public function __construct($modelo, $motor = 1.0, $ano = 2019) 
    {
        $this->modelo = $modelo;
        $this->motor = $motor;
        $this->ano = $ano;
        
        self::$qtdeCarros++;
    }
    
    public function __set($name, $value) 
    {
        $this->$name = $value;
    }
    
    public function __get($name) 
    {
        return $this->$name;
    }
    
    public function turbinar($cilindradas) 
    {
        $this->motor += $cilindradas;
    }
    
}
