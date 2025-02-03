<?php

use app\classes\Connection;
use Dotenv\Dotenv;

require_once dirname(__DIR__) . '/vendor/autoload.php';
session_start();

$dotenv = Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

$conn = new Connection;
?>