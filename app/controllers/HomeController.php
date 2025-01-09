<?php

namespace app\controllers;

class HomeController
{
    public function index()
    {
        echo getView('home',[
            'userName' => 'Luizin'
        ]);
    }
}