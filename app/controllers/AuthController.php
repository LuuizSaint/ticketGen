<?php

namespace app\controllers;

use app\classes\Session;

class AuthController
{
    public function index(){

        $authName = self::authName();
        $authMail = self::authMail();
        $authGit = self::authGit();
        $authAvatar = self::authAvatar();

        if($authName && $authMail && $authGit && $authAvatar){
            // salvar no banco
        }

    }
    public static function authAvatar(){
        $img = $_FILES["imgFile"];
        $imgType = mime_content_type($img["tmp_name"]);
        $imgError = $img["error"];
        $imgSize = $img["size"];

        $arrayExtension = ['image/jpeg', 'image/png', 'image/webp'];
        $maxSize = 500 * 1024;

        if($imgError !== 0){
            Session::set("imgError", "Something unexpected happened, please try again.");
            redirect("/");
        }

        if($imgSize > $maxSize){
            Session::set("imgSize", "File too large! Please upload a photo under 500KB.");
            Session::set("imgError", "");
            redirect("/");
        }

        if(!in_array($imgType, $arrayExtension)){
            Session::set("imgType", "Invalid file type! Please upload a JPEG or PNG.");
            Session::set("imgError", "");
            redirect("/");
        }
    }
    public static function authName()
    {
        $userName = isset($_POST['inputName'])? htmlspecialchars(trim($_POST['inputName'])) : null;

        if(strlen($userName) <= 3 || strlen($userName) >= 32){
            Session::set("nameLen", "Greater than 3 and less than 32 characters.");
            redirect("/");
        }
        return true;
    }
    public static function authMail()
    {
        $userMail = isset($_POST['inputMail'])? trim($_POST['inputMail']) : null;

        if(!filter_var($userMail, FILTER_SANITIZE_EMAIL)){
            Session::set("mailInvalid", "Invalid email.");
            redirect("/");
        }

        if(strlen($userMail) <= 6 || strlen($userMail) >= 39){
            Session::set("mailLen", "Greater than 6 and less than 39 characters.");
            redirect("/");
        }
        return true;
    }
    public static function authGit()
    {
        $userGit = isset($_POST['inputGit'])? htmlspecialchars(trim($_POST['inputGit'])) : null;

        if(strlen($userGit) <= 3 || strlen($userGit) >= 32){
            Session::set("gitLen", "Greater than 3 and less than 32 characters.");
            redirect("/");
        }
        if (!preg_match("/^[a-zA-Z0-9-_]+$/", $userGit)) {
            Session::set("gitInvalid", "Git user contains invalid characters.");
            redirect("/");
        }
        return true;
    }
}