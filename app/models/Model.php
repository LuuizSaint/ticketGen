<?php

namespace app\models;

use app\classes\Connection;

class Model
{

    public static function executeModel(string $userName, string $userMail, string $userGit, string $userAvatar){
        $find = self::find($userMail);

        if($find){

            $create = self::crate($userName, $userMail, $userGit, $userAvatar);
        }
        
        
    }
    public static function crate(){
        $conn = Connection::getConn();

    }
    public static function find(string $userMail){
        $conn = Connection::getConn();
        
        $sql = "SELECT id FROM tickets WHERE email = ?";
        $stmt = $conn->prepare($sql);

        $stmt->execute([$userMail]);

        return $stmt->fetchObject();
    }

}