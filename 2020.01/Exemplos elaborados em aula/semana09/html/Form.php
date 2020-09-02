<?php

namespace html;

class Form
{
    /** @var string $name Nome do formulário. */
    private $name;

    /** @var array $inputs Vetor com todos os campos de entrada do formulário. */
    private $inputs;

    /**
     * Constroi um elemento HTML Form.
     * 
     * @param string $name Nome do formulário.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Adiciona um elemento HTML Input no formulário.
     * 
     * @param html\InputInterface $input Elemento 'input' que será adicionado ao formulário.
     * 
     * @return void 
     */
    public function addInput(InputInterface $input): void
    {
        $this->inputs[] = $input;
    }

    /**
     * Gera todo o HTML para o formulário e os respectivos 'inputs' inseridos.
     * 
     * @return string O HTML do formulário.
     */
    public function render(): string
    {
        $html = "\n<form name=\"$this->name\" id=\"$this->name\">\n";

        // Inserindo o HTML dos inputs no formulário.
        foreach ($this->inputs as $input) {
            $html .= $input->render();
        }

        $html .= "</form>\n";

        return $html;
    }
}