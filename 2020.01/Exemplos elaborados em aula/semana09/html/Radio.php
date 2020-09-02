<?php

namespace html;

class Radio extends InputList implements InputInterface
{    
    public function render(): string
    {
        // 'ucfirst' -> Deixa em maiúscula a primeira letra da 'string' passada por parâmetro.
        $html = "\t<p>" . ucfirst($this->name) . ": <br>\n";

        foreach ($this->options as $value => $label) {
            $html .= "\t<input type=\"radio\" name=\"$this->name\" id=\"$this->name$value\" value=\"$value\"> $label <br>\n";
        }

        $html .= "\t</p>\n";
        
        return $html;
    }
}
