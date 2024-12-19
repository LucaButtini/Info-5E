<?php

class Smartphone extends Dispositivo
{
    public function __construct (string $marca, float $prezzo, private string $modello)
    {
        parent::__construct($marca, $prezzo);
    }

    public function getModello(): string
    {
        return $this->modello;
    }

    public function setModello(string $modello): void
    {
        $this->modello = $modello;
    }

    public function stampa():string
    {
        return "Sono uno smartphone e il mio modello è {$this->modello} e la mia marca è ".$this->getMarca().'.';
    }

}