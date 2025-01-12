<?php

class FileSystem
{

    private array $discipline;

    public function __construct(array $discipline){
        $this->discipline = $discipline;
    }

    public function getDiscipline(): array
    {
        return $this->discipline;
    }

    public function setDiscipline(array $discipline): void
    {
        $this->discipline = $discipline;
    }


}