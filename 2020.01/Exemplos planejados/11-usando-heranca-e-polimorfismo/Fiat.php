<?php

class Fiat extends Carro 
{ // Herança - herdando atributos e métodos da classe pai
    
    // SOBRESCRITA DO MÉTODO __get DA CLASSE PAI (Carro)
    public function __get($atributo) 
    {
        
        // tratamento diferenciado para um atributo específico
        if ($atributo == 'modelo') {
            
            return 'Fiat ' . $this->modelo;
            
        } else {
            
            // se for qualquer outro atributo, use o método padrão da 
            // classe pai.
            return parent::__get($atributo);
            
        }
    }  
}

