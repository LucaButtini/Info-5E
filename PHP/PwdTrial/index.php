<?php

// cifriamo la password per metterla dentro il database
//hash è una funzione che calcola a partire di un codice una firma univoca per quella stringa,
// dalla stringa finale non torni indietro e se di quel dato cambio una cosa minima, cambia l'hash


$userPwd= 'p'; //$_POST['pwd'];
$hashedPwd= password_hash($userPwd,PASSWORD_DEFAULT);
// la hash crea la stringa che nasce anche dal dato SALT, che è un numero casuale
// e c'è in chiaro il sale e la parte "informatica"
//il verify prende la password e l'hash, si prende la parte SALT, circa 22 caratteri dopo $2y$10$.

echo 'Password: '.$userPwd.'<br>';
echo 'Hashed Password: '.$hashedPwd.'<br>';
echo 'Hashed password lenght: '.strlen($hashedPwd).'<br>';


if(password_verify($userPwd, $hashedPwd))
    echo 'login'.'<br>';

