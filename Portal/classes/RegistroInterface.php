<?php

interface RegistroInterface 
{
    /**
     * Retorna todos os registros da tabela como um vetor.
     * 
     * @return array
     */
    public static function obterTodos(): array;

    /**
     * Retorna o registro da tabela que possui o $id informado.
     * 
     * @param int $id Identificação do registro que se deseja obter.
     * 
     * @return array
     */
    public static function obter(int $id): array;

    /**
     * Retorna true se puder armazenar na tabela os valores do vetor fornecido.
     * 
     * @param array $registro Vetor associativo com os campos e respectivos valores do registro.
     * 
     * @return bool
     */
    public static function inserir(array $registro): bool;
    
    /**
     * Usa os valores do vetor $registro para atualizar o registro da tabela que possui o $id informado.
     * 
     * @param array $registro Vetor associativo com os campos e os respectivos valores que se deseja alterar.
     * @param int $id Identificação do registro que se deseja alterar.
     * 
     * @return void 
     */
    public static function alterar(array $registro, int $id): void;

    /**
     * Remove da tabela o registro que possui o $id informado.
     * 
     * @param int $id Identificação do registro que se deseja obter.
     * 
     * @return void
     */
    public static function excluir(int $id): void;
}