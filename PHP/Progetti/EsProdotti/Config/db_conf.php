<?php

return [
    'dsn' => 'mysql:host=localhost;dbname=prod_elettronica',
    'username' => 'root',
    'password' => '',
    'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
];