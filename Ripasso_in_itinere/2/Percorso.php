<?php

class Percorso
{
    private string $path;
    private string $argomento;
    private string $mese;

    public function __construct(string $path, string $argomento, string $mese) {
        $this->path = $path;
        $this->argomento = $argomento;
        $this->mese = $mese;
    }

    public function getPath(): string {
        return $this->path;
    }

    public function getArgomento(): string {
        return $this->argomento;
    }

    public function getMese(): string {
        return $this->mese;
    }

    public function setPath(string $path): void {
        $this->path = $path;
    }

    public function setArgomento(string $argomento): void {
        $this->argomento = $argomento;
    }

    public function setMese(string $mese): void {
        $this->mese = $mese;
    }

   // controllo se ci sono paths uguali
    public function checkPaths(Percorso $altroPercorso): bool {
        return $this->path === $altroPercorso->getPath();
    }
}
