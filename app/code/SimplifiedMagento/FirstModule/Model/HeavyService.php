<?php


namespace SimplifiedMagento\FirstModule\Model;


class HeavyService
{
    public function __construct()
    {
        echo "Heavy Service Initiated! "." </br>";
    }

    public function getPrintHeavyServiceMessage()
    {
        echo "Heavy Service Class Message!";
    }
}