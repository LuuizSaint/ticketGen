<?php

namespace app\views;
use Exception;

class View
{
    private static function viewFound(string $view)
    {
        $viewPath = dirname(__FILE__)."/pages/{$view}.php";

        if(!file_exists($viewPath)){
            throw new Exception("VIEW: /{$view} Não Encontrada");
        }

        return $viewPath;
    }

    public static function viewExecutor(string $view, array $data)
    {
        $viewPath = self::viewFound($view);

        ob_start();
        extract($data);

        require $viewPath;

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}