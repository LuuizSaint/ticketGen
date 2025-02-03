<?php

namespace app\controllers;

use app\classes\Session;
use app\models\Model;

class AuthController
{
    public string $gitName;
    public array $imgInfo;

    public function index(){

        $auth = $this->authInfo();

    }

    public function authInfo(){

        $authName = self::authName();
        $authMail = self::authMail();
        $this->gitName = self::authGit();
        $this->imgInfo = self::authAvatar();

        $avatarPath = moveFile($this->gitName, $this->imgInfo);

        $saveData = Model::executeModel($authName, $authMail, $this->gitName, $avatarPath);

    }
    public static function authAvatar(){
        $img = $_FILES["imgFile"];
        $imgType = mime_content_type($img["tmp_name"]);
        $imgError = $img["error"];
        $imgSize = $img["size"];

        $arrayExtension = ['image/jpeg', 'image/png'];
        $maxSize = 500 * 1024;

        if($imgError !== 0 || !in_array($imgType, $arrayExtension) || $imgSize > $maxSize){
            Session::set("imgError", true);
            redirect("/");
        }
        return $img;
    }
    public static function authName()
    {
        $userName = isset($_POST['inputName'])? htmlspecialchars(trim($_POST['inputName'])) : null;

        if(strlen($userName) <= 3 || strlen($userName) >= 32){
            Session::set("nameLen", "Greater than 3 and less than 32 characters.");
            redirect("/");
        }
        return $userName;
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
        return $userMail;
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
        return $userGit;
    }
}