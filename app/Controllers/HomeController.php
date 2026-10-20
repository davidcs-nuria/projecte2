<?php
namespace App\Controllers;
use App\Core\DB;

class HomeController {
    function index(){
        $db=new DB();
        return view("home", ["title"=>"Home"]);
    }
    function contact(){
        return view("contact", ["title"=>"Contact"]);
    }
}
?>