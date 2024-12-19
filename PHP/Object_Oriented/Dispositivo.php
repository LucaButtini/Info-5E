<?php

abstract class Dispositivo
{
    public function __construct(protected string $marca, protected float $prezzo)
    {

    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function getPrezzo(): float
    {
        return $this->prezzo;
    }

    public function setPrezzo(float $prezzo): void
    {
        $this->prezzo = $prezzo;
    }

    public function accensione():string
    {
        return "Il dispositivo è stato acceso".'<br>';
    }
    abstract public function stampa();


}