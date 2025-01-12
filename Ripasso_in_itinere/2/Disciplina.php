<?php

class Disciplina {
    private string $nome;
    private array $percorsi = [];

    public function __construct(string $nome, array $percorsi = []) {
        $this->nome = $nome;
        $this->percorsi = $percorsi;
    }

    public function getPercorsi(): array {
        return $this->percorsi;
    }

    public function setPercorsi(array $percorsi): void {
        $this->percorsi = $percorsi;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    // Metodi
    public function addPercorso(Percorso $nuovoPercorso): bool {
        foreach ($this->percorsi as $percorso) {
            if ($percorso->equals($nuovoPercorso)) {
                return false; // Il percorso esiste già
            }
        }
        $this->percorsi[] = $nuovoPercorso;
        return true;
    }

    public function find(string $path): ?Percorso {
        foreach ($this->percorsi as $percorso) {
            if($percorso->getNome() == $path) {
                return $percorso;
            }
        }
        return null;//non trovato
    }
}
