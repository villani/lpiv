<?php

class Noticia extends Conexao implements RegistroInterface
{
    /** Campos de um registro de notícia. */
    private $id;
    private $usuario_id;
    private $categoria_id;
    private $titulo_n;
    private $resumo;
    private $figura;
    private $fonte;
    private $conteudo;
    private $data_hora;

    private static $titulo = 'noticias';
    
    use Crud;

    public static function obterDaCategoria(int $id): array
    {
        self::init();
        $select = "SELECT * FROM " . self::$titulo . " WHERE categoria_id=:id";
        $comando = self::$pdo->prepare($select);
        $comando->bindParam(':id', $id);
        $comando->execute();
        return $comando->fetchAll();
    }

    public static function obterDoUsuario(int $id): array
    {
        self::init();
        $select = "SELECT * FROM " . self::$titulo . " WHERE usuario_id=:id";
        $comando = self::$pdo->prepare($select);
        $comando->bindParam(':id', $id);
        $comando->execute();
        return $comando->fetchAll();

    }

    public static function validarEdicao($id, int $usuario_id, int $categoria_id, string $titulo, string $resumo, ?string $figura, string $fonte, string $conteudo): bool
    {
        if ($id === '') {
            $noticias = self::obterTodos();
            $ultimo = count($noticias) - 1;
            $id = $noticias[$ultimo]['id'] + 1;
            $data_hora = time();
            $dados = [$id, $usuario_id, $categoria_id, $titulo, $resumo, $figura, $fonte, $conteudo, $data_hora];
            self::inserir($dados);
        } else {
            $data_hora = time();
            if (is_null($figura)) {
                $dados = compact('usuario_id', 'categoria_id', 'titulo', 'resumo', 'conteudo', 'data_hora');
            } else {
                $dados = compact('usuario_id', 'categoria_id', 'titulo', 'resumo', 'figura', 'fonte', 'conteudo', 'data_hora');
            }
            self::alterar($dados, $id);
        }
        return true;
    }

}