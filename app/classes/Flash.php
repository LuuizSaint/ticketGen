<?php

namespace app\classes;

class Flash
{
    public static function getFlash(string $index)
    {
        if(Session::has($index)){
            $errorMsg = $_SESSION[$index];
            Session::unset($index);
            return $errorMsg;
        }

        return false;
    }

    public static function flash(string $index){
        $msg = self::getFlash($index);

        if($msg){
            return "<p id='errorMsg'>
            <i class='fa-solid fa-circle-info'></i><span>{$msg}</span>
            </p>";
        }
    
    }
}
