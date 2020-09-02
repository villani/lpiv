<?php

class Tabela extends Conexao
{
    protected $titulo = null;

    private static $pdo = null;

    public function __construct(string $titulo)
    {
        $this->titulo = $titulo;
        if (is_null(self::$pdo)) self::$pdo = self::getPDO();
    }
   
    public function obterTodos(): array
    {
        self::init();
        $select = "SELECT * FROM $this->titulo";
        $comando = self::$pdo->query($select);
        return $comando->fetchAll(); 
    }
    public function obter(int $id): array
    {
        self::init();
        $select = "SELECT * FROM $this->titulo WHERE id=:id";
        $comando = self::$pdo->prepare($select);
        $comando->bindParam(':id', $id);
        $comando->execute();
        return $comando->fetch();
    }
    public function inserir(array $registro): void
    {
        self::init();
        $insert = "INSERT INTO $this->titulo VALUES (?";
        $count = count($registro);
        for ($i = 1; $i < $count; $i++) {
            $insert .= ',?';
        }
        $insert .= ')';
        $comando = self::$pdo->prepare($insert);
        for ($i = 0; $i < $count; $i++) {
            $comando->bindParam($i + 1, $registro[$i]);
        }
        $comando->execute();
    }
    public function alterar(array $registro, int $id): void
    {
        self::init();
        $update = "UPDATE $this->titulo SET ";
        $campos = array_keys($registro);
        $update .= $campos[0] . ' = ?';
        $count = count($campos);
        for ($i = 1; $i < $count; $i) {
            $update .= ', ' . $campos[$i] . ' = ? ';
        }
        $update .= ' WHERE id = :id';
        var_dump($update);
        $comando = self::$pdo->prepare($update);
        for ($i = 0; $i < $count; $i++) {
            $comando->bindParam($i + 1, $registro[$campos[$i]]);
        }
        $comando->bindParam(':id', $id);
        var_dump($comando);
        $comando->execute();
    }
    public function excluir(int $id): void
    {
        self::init();
        $delete = "DELETE FROM $this->titulo WHERE id = :id";
        $comando = self::$pdo->prepare($delete);
        $comando->bindParam(':id', $id);
        $comando->execute();
    }
}