<?php

namespace app\classes;

class Flash
{
    public static function getFlash(string $index)
    {
        $errorMsg = $_SESSION[$index];
        Session::unset($index);
        return $errorMsg;

    }

    public static function falsh(string $index){
        $msg = self::getFlash($index);
    
        return "<p id='errorMsg'>
        <i class='fa-solid fa-circle-info'></i><span>{$msg}</span>
        </p>";
    }
}
