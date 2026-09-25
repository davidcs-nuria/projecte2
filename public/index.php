<?php
require_once __DIR__."/../vendor/autoload.php";

use App\Core\Request;
use App\Core\Router;

$req=new Request();

$router=new Router($req);
?>