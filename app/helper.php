<?php
    function dd(){
        foreach (func_get_args() as $item) {
            echo "<pre>";
            var_dump($item);
            echo "</pre>";
        }
        die;
    }

    function view(string $view, array $data=[]) {
        if ($data && is_array($data)) extract($data);
        require_once __DIR__."/Views/pages/".$view.".view.php";
    }

    function env(string $var) {
        return filter_var($_ENV[$var]);
    }