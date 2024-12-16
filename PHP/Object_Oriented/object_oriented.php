<?php
//oggetti in php
require_once 'Person.php'; //importa un file una volta sola
require_once 'Student.php';
require_once 'Teacher.php';
// "require" importa più volte il file

$p1 = new Person('Berna', 18, 'berna@mail.com');
echo $p1->getName().'<br>';
echo $p1->introduce().'<br>';

$s1= new Student('Bob', 17, 'bob@mail.com', 'itis');
echo $s1->introduce().'<br>';
echo $s1->studentPresentation().'<br>';
echo $s1->toDo().'<br>';

$t1= new Teacher('name1', 'lastname1');
$t2= new Teacher('name2', 'lastname2');
$t3= new Teacher('name3', 'lastname3');

echo Teacher::getRegister().'<br>';

