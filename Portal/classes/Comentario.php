<?php

class Comentario extends Conexao implements RegistroInterface
{
    /** Campos de um registro de comentário. */
    private $id;
    private $usuario_id;
    private $noticia_id;
    private $comentario;
    private $data_hora;

    private static $titulo = 'comentarios';
    
    use Crud;

    public static function obterDaNoticia(int $id): array
    {
        self::init();
        $select = "SELECT c.id, c.comentario, c.data_hora, u.nome FROM comentarios c, usuarios u";
        $select .= " WHERE noticia_id=:id AND c.usuario_id=u.id";
        $comando = self::$pdo->prepare($select);
        $comando->bindParam(':id', $id);
        $comando->execute();
        return $comando->fetchAll();
    }

}