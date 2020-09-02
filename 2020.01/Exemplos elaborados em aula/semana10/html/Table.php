<?php

namespace html;

use \Exception;

class Table
{
    // Atributos de um objeto 'Table'
    private $labels;
    private $lines;

    // Atributos da classe 'Table'
    private static $count;
    private static $tables;

    // Métodos de um objeto 'Table'
    public function __construct(array $labels) 
    {
        $this->labels = $labels;
        self::$count++;
    }

    public function addLine(array $line): void
    {
        if (count($line) != count($this->labels)) {
            throw new Exception('The quantity of elements must be the same of labels.');
        }
        $this->lines[] = $line;
    }
    public function render(): string 
    {
        // Início da tabela
        $html = "<table border=\"1\">\n";

        // Linha dos rótulos (cabeçalho das colunas)
        $html .= "\t<tr>\n";
        for ($c = 0; $c < count($this->labels); $c++) {
            $html .= "\t\t<th>" . $this->labels[$c] . "</th>\n";
        }
        $html .= "\t</tr>\n";

        // Linhas dos dados
        for ($l = 0; $l < count($this->lines); $l++) {
            $html .= "\t<tr>\n";
            for ($c = 0; $c < count($this->labels); $c++) {
                $html .= "\t\t<td>" . $this->lines[$l][$c] . "</td>\n";
            }
            $html .= "\t</tr>\n";
        }
    
        // Fim da tabela
        $html .= "</table>\n";
        self::$tables[] = $html;
        return $html;
    }

    // Métodos da classe 'Table'
    public static function getCount(): int 
    {
        return self::$count;
    }
    public static function getTables(): string 
    {
        $html = "<h1>Tables</h1>\n";
        for ($i = 0; $i < self::$count; $i++) {
            $html .= "<h2>Table " . ($i + 1) . "</h2>\n";
            $html .= self::$tables[$i];
            $html .= "\n";
        }
        return $html;
    }
}