<?php
return [
    'dns' => 'mysql:host=localhost;dbname=mvc5E',   //Data Source Name
    'username' => 'root',
    'password' => '',
    'options' => [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
];
