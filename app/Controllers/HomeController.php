<?php
namespace App\Controllers;

class HomeController {
    function index(){
        return view("home", ["title"=>"Home"]);
    }
    function contact(){
        return view("contact", ["title"=>"Contact"]);
    }
}
?>