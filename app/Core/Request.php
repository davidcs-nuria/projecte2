<?php
    namespace App\Core;

    class Request {
        protected string $uri;
        protected string $method;
        function __construct(){
            $this->uri=parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
            $this->method=$_SERVER["REQUEST_METHOD"];
        }

        function getUri():string {
            return $this->uri;
            // $result = "";
            // $result .= "<ol>";
            // foreach ($this->uri as $key) {
            //     $result .=  "<li>".$key."</li>";
            // }
            // $result .=  "</ol>";
            // return $result;
        }

        function getMethod():string|null {
            return $this->method;
        }

        function query(string $data) {
            return filter_input(INPUT_GET, $data);
        }

        function post(string $data) {
            return filter_input(INPUT_POST, $data);
        }

        function get() {
            return $_GET??[];
        }
    }
?>