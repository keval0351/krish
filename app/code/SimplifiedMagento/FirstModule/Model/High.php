<?php


namespace SimplifiedMagento\FirstModule\Model;

use SimplifiedMagento\FirstModule\Api\Brightness;

class High implements Brightness
{

    public function getBrightness()
    {
        return "High";
    }
}