<?php

/**
 * Usa um objeto \PDO para comunicação com um base de dados.
 */
class Conexao
{
    /** @var string DSN Nome da origem dos dados. */
    private const DSN = "sqlite:" . __DIR__ . "/../banco/portal.sqlite";

    /** @var \PDO|null Objeto PHP de dados. */
    private static $pdo = null;

    /**
     * Retorna um Objeto PHP de dados. Cria um novo objeto se já não houver um criado.
     * 
     * @return \PDO
     */
    protected static function getPDO(): \PDO
    {
        if (is_null(self::$pdo)) {
            self::$pdo = new PDO(self::DSN);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return self::$pdo;
    }
}