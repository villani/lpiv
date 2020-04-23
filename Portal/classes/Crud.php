<?php

trait Crud
{
    private static $pdo = null;

    protected static function init(): void
    {
        if (is_null(self::$titulo)) throw new Exception("O título da tabela não foi informado.");
        if (is_null(self::$pdo)) self::$pdo = self::getPDO();
    }
    
    public static function obterTodos(): array
    {
        self::init();
        $select = "SELECT * FROM " . self::$titulo;
        $comando = self::$pdo->query($select);
        return $comando->fetchAll(); 
    }
    public static function obter(int $id): array
    {
        self::init();
        $select = "SELECT * FROM " . self::$titulo . " WHERE id=:id";
        $comando = self::$pdo->prepare($select);
        $comando->bindParam(':id', $id);
        $comando->execute();
        return $comando->fetch();
    }
    public static function inserir(array $registro): bool
    {
        self::init();
        $insert = "INSERT INTO " . self::$titulo . " VALUES (?";
        $count = count($registro);
        for ($i = 1; $i < $count; $i++) {
            $insert .= ',?';
        }
        $insert .= ')';
        $comando = self::$pdo->prepare($insert);
        for ($i = 0; $i < $count; $i++) {
            $comando->bindParam($i + 1, $registro[$i]);
        }
        if($comando->execute()) return true;
        else throw new Exception('Falha ao inserir registro.');
    }
    public static function alterar(array $registro, int $id):void
    {
        self::init();
        $update = "UPDATE ". self::$titulo . " SET ";
        $campos = array_keys($registro);
        $update .= $campos[0] . ' = ?';
        $count = count($campos);
        for ($i = 1; $i < $count; $i++) {
            $update .= ', ' . $campos[$i] . ' = ? ';
        }
        $update .= ' WHERE id = :id';
        
        $comando = self::$pdo->prepare($update);
        for ($i = 0; $i < $count; $i++) {
            $comando->bindParam($i + 1, $registro[$campos[$i]]);
        }
        $comando->bindParam(':id', $id);
        
        $comando->execute();
    }
    public static function excluir(int $id): void
    {
        self::init();
        $delete = "DELETE FROM " . self::$titulo . " WHERE id = :id";
        $comando = self::$pdo->prepare($delete);
        $comando->bindParam(':id', $id);
        $comando->execute();
    }
}