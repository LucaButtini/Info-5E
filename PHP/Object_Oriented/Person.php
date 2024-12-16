<?php

class Person
{
    /*private string $name;
    private int $age;
    private string $email;*/



    /*public function __construct(string $name, int $age, string $email){//costruttore
        $this.$name=$name;
        $this.$age= $age;
        $this.$email=$email;
    }*/

    const PREFERED_COLOR = 'cyan';
    public function __construct(protected string $name, private int $age, private ?string $email){ // ? per il null così non da eccezioni

    }
    //metodi get e set
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function introduce(){
        return "Hi, my name is {$this->name}, I am {$this->age} and this is my email {$this->email}
        and my favourite color is ".self::PREFERED_COLOR.'.';
    }

}