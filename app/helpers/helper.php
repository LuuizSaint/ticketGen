<?php

use app\classes\Route;
use app\classes\Session;
use app\views\View;

function getRoute() {
    try {

        $routes = require dirname(__DIR__, 2).'/app/routes/routes.php';
        $obRoute = new Route();
        $obRoute->routeExecutor($routes);

    } catch (Throwable $th) {
        var_dump($th->getMessage());
    }

}
function getView(string $view, array $data = []){
    try {

        $obView= new View;
        return $obView->viewExecutor($view, $data);

    } catch (Throwable $th) {
        var_dump($th->getMessage());
    }
}

function redirect(string $to){
    return header("Location: {$to}");
}

function moveFile(string $gitName, array $imgInfo){
    $imgName = $imgInfo["name"];
    $imgTmpName = $imgInfo["tmp_name"];
    $imgExtension = pathinfo($imgName, PATHINFO_EXTENSION);

    $path = dirname(__DIR__, 2)."/public/uploads/".$gitName.".".$imgExtension;
    var_dump($path);
    // move_uploaded_file($imgTmpName, $path);
}
?>