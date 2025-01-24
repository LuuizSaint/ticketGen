<?php

namespace app\models;

class Model
{
    public static function crate(){
        $pdo = "INSERT INTO 'tickets'('userName', 'userMail', 'userGit', 'ticketCode') VALUES(:?, :?, :?, :?)";

    }
    public static function find(){
        
    }
    public static function remove(){

    }
}