<?php
namespace App\Controllers;
use App\Core\DB;
use App\Models\User;
use PDOException;

class HomeController {
    function index(){
        $db=new DB();

    try {
        $user = new User;
        $res = $user->create([
            'id'=>'1',
            'name'=>'pepe',
            'email'=>'pepitopwpw@gmail.com',
            'password'=>password_hash("1234", PASSWORD_BCRYPT)
        ]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }

        return view("home", ["title"=>"Home", "user"=>$res]);
    }
    function contact(){
        return view("contact", ["title"=>"Contact"]);
    }
}
?>