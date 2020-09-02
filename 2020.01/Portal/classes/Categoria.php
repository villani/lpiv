<?php

class Categoria extends Conexao implements RegistroInterface
{
    /** Campos de um registro de categoria. */
    private $id;
    private $usuario_id;
    private $nome;

    private static $titulo = 'categorias';
    
    use Crud;

    public static function obterUsadas(): array
    {
        self::init();
        $select = "SELECT DISTINCT n.categoria_id, c.id, c.nome FROM noticias n, categorias c";
        $select .= " WHERE n.categoria_id = c.id";
        $comando = self::$pdo->query($select);
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

    public static function validarEdicao(?int $id, int $usuario_id, string $nome): bool
    {
        $categorias = self::obterTodos();
        $busca = array_search( $nome, array_column( $categorias, 'nome' ) );

        if ($busca !== false) {
            throw new Exception("A categoria <b>$nome</b> já existe.");
        }

        if (is_null($id)) {
            $ultimo = count($categorias) - 1;
            $id = $categorias[$ultimo]['id'] + 1;
            $dados = [$id, $usuario_id, $nome];
            self::inserir($dados);
        } else {
            $dados = compact('usuario_id', 'nome');
            self:: alterar($dados, $id);
        } 
        return true;
    }

}