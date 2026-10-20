<?php
    return [
        'dsn'=>env('DB_DRVR').':dbname='.env('DB_NAME').';host:'.env('DB_HOST').';charset=utf8mb4',
        'user'=>env("DB_USER"),
        'pass'=>env("DB_PASS")
    ];
?>