<?php

class Select 
{
    private $name;
    private $options;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public function __get($name) 
    {
        return $this->$name;
    }
    
    public function toHtml()
    {
        $html = "<select name=\"$this->name\">\n";
        
        foreach ($this->options as $chave => $valor) {
            $html .= "\t<option value=\"$chave\">$valor</option>\n";
        }
        
        $html .= "</select>";
        
        return $html;
    }
    
    public function __call($name, $arguments) 
    {
        switch ($name) {
            case 'setOptions':
                
                if (is_array($arguments[0])) {
                    
                    $this->options = $arguments[0];
                    
                } else if (is_string($arguments[0])) {
                    
                    $this->options[] = $arguments[0];
                    
                } else {
                    
                    throw new Exception('Valores inválidos para o '
                            . 'argumento do método setOptions.');
                    
                }
                break;
            default:
                throw new Exception('Método inexistente');
        }
    }
}

