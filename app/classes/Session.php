<?php

namespace app\classes;

class Session
{
    public static function set(string $index, mixed $value)
    {
        if(!self::has($index)){
            $_SESSION[$index] = $value;
        }
    }
    public static function has(string $index)
    {
        if(isset($_SESSION[$index])){
            return true;
        }

        return false;
    }
    public static function get(string $index)
    {
        if(self::has($index)){
            return $_SESSION[$index];
        }
    }
    public static function unset(string $index)
    {
        if(self::has($index)){
            unset($_SESSION[$index]);
        }
    }
    public static function destroy()
    {
        session_destroy();
        $_SESSION = [];

    }
}