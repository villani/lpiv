<?php

namespace html;

class InputList
{
    /** @var string $name Nome do elemento Input. */
    protected $name;

    /** @var array $options Contém as opções da lista. */
    protected $options;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }
}