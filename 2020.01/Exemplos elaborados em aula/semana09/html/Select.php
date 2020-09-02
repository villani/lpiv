<?php

namespace html;

class Select extends InputList implements InputInterface
{
    public function render(): string
    {
        $html = "\t<p>" . ucfirst($this->name) . ": <br>\n";
        $html .= "\t<select name=\"$this->name\" id=\"$this->name\">\n";

        // Inserir as opções da lista.
        foreach ($this->options as $value => $label) {
            $html .= "\t\t<option value=\"$value\">$label</option>\n";
        }
        $html .= "\t</select>\n";
        $html .= "\t</p>\n";
        return $html;
    }
}