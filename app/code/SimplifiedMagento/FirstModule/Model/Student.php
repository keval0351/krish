<?php


namespace SimplifiedMagento\FirstModule\Model;


class Student
{
    private $name;
    private $age;
    private $scores;

    public function __construct($name = "Keval", $age = 28, array $scores = array("Maths" => 70, "Science" => 90, "English" => 80))
    {
        $this->name = $name;
        $this->age = $age;
        $this->scores = $scores;
    }
}