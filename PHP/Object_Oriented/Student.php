<?php
require_once 'Volunteer.php';
class Student extends Person implements Volunteer
{
    public function __construct(string $name, int $age, ?string $email, private string $school)
    {
        parent::__construct($name, $age, $email);
    }

    public function studentPresentation():string{
        return parent::introduce()." I am a student and I am attending this school: $this->school";
    }

    public function toDo(): string
    {
        return "My name is $this->name and I am a 's Volunteer";
    }
}

