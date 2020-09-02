<?php

class Usuario extends Conexao implements RegistroInterface
{
    /** Campos de um registro de usuário. */
    private $id;
    private $nome;
    private $senha;
    private $nivel;

    private static $titulo = 'usuarios';
    
    use Crud;

    public function recuperarSenha(string $email)
    {

    }

    public function efetuarLogin(string $email, string $senha): bool
    {
        self::init();
        $select = "SELECT * FROM " . self::$titulo;
        $select .= " WHERE email=:email";
        $comando = self::$pdo->prepare($select);
        $comando->bindParam(':email', $email);
        $comando->execute();
        $usuario = $comando->fetch();
        if ($usuario) {
            if ($usuario['senha'] == $senha) {
                $_SESSION['usuario'] = $usuario;
            } else {
                throw new Exception('Senha inválida.');
            }
        } else {
            throw new Exception('Usuário inválido.');
        }
        return true;
    }

    public function verificarEmail(string $email): bool
    {
        self::init();
        $select = "SELECT * FROM " . self::$titulo;
        $select .= " WHERE email=:email";
        $comando = self::$pdo->prepare($select);
        $comando->bindParam(':email', $email);
        $comando->execute();
        $usuario = $comando->fetch();
        if ($usuario) return true;
        else return false;
    }

}