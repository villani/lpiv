<?php

class Avaliacao extends Conexao implements RegistroInterface
{
    /** Campos de um registro de avalição. */
    private $id;
    private $usuario_id;
    private $noticia_id;
    private $relevante;

    private static $titulo = 'avaliacoes';
    
    use Crud;

    public static function obterDoUsuario($usuario, $noticia) {
        self::init();
        $select = "SELECT * FROM " . self::$titulo;
        $select .= " WHERE usuario_id=:id AND noticia_id=:noticia";
        $comando = self::$pdo->prepare($select);
        $comando->bindParam(':id', $usuario);
        $comando->bindParam(':noticia', $noticia);
        $comando->execute();
        return $comando->fetch();
    }

    public static function obterDaNoticia($id) {
        self::init();
        $select = "SELECT * FROM " . self::$titulo;
        $select .= " WHERE noticia_id=:id";
        $comando = self::$pdo->prepare($select);
        $comando->bindParam(':id', $id);
        $comando->execute();
        return $comando->fetchAll();
    }

}