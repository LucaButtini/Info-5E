<?php

return [
    'dns' => 'mysql:host=localhost;dbname=utopia',
    'username' => 'root',
    'password' => '',
    'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
];