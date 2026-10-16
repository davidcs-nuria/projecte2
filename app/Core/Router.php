<?php
    namespace App\Core;

    use App\Controllers\HomeController;
    use App\Core\Request;
    use Exception;

    class Router {
        private array $routes = [];
        protected Request $req;
        function __construct()
        {
            $this->routes=require __DIR__."/../Config/routes.php";
            $this->req=new Request;
            try {
                $this->dispatch();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        function dispatch() {
            $uri=$this->req->getUri();
            $method=$this->req->getMethod();
            $found=false;

            foreach ($this->routes as $route) if (($route["path"]===$uri && $route["method"]===$method && !$found)) {
                $this->execute($route);
                $found=true;
            }
            if (!$found) throw new \RuntimeException("No route");
            // Comprobar si URI y Método están en rutas
            // $this->exec($routes['handler'];);
        }
        function getRequest() {
            return $this->req;
        }

        private function execute(array $route){
            $array_handler= $route["handler"];
            $controller=new $array_handler[0]();
            $method=$array_handler[1];

            if(!method_exists($controller,$method)) throw new \RuntimeException("Function $method is not called");
            call_user_func_array([$controller, $method], $this->getRequest()->get());
        }
    }
?>