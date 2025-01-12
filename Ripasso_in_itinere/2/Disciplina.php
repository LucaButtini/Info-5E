<?php


class Disciplina
{
    private string $nome;
    private array $percorsi = [];

    public function __construct(string $nome, array $percorsi) {
        $this->nome = $nome;
        $this->percorsi = $percorsi;
    }

    public function getPercorsi(): array
    {
        return $this->percorsi;
    }

    public function setPercorsi(array $percorsi): void
    {
        $this->percorsi = $percorsi;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    //metodi




}
