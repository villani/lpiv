<?php

namespace html;

class Select implements InputInterface
{
    /** @var string $name Nome do elemento Select. */
    private $name;

    /** @var array $options Contém as opções da lista de seleção. */
    private $options;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    public function render(): string
    {
        $html = "<select name=\"\" id=\"\">";

        // Inserir as opções da lista.
        foreach ($this->options as $value => $label) {
            $html .= "<option value=\"$value\">$label</option>";
        }
        $html .= "</select>";
        return $html;
    }
}