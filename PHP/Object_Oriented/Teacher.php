<?php

class Teacher
{
 private static int $register=0;
 public function __construct(private string $name, private string $lastName)
 {
     self::$register++;
 }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public static function getRegister():int{
     return self::$register;
    }
}