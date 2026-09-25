<?php
    namespace App\Core;

    use App\Controllers\HomeController;

    class Router {
        function __construct(Request $req)
        {
            new HomeController();
        }
    }
?>