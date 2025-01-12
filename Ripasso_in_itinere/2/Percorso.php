<?php

class Percorso
{
    private string $argomento;
    private string $mese;

    public function __construct(string $argomento, string $mese){
        $this->argomento = $argomento;
        $this->mese = $mese;
    }

    public function getMese(): string
    {
        return $this->mese;
    }

    public function setMese(string $mese): void
    {
        $this->mese = $mese;
    }

    public function getArgomento(): string
    {
        return $this->argomento;
    }

    public function setArgomento(string $argomento): void
    {
        $this->argomento = $argomento;
    }

    //metodi




}