<?php


$materie=[
    'Informatica' => [
        'C:\Utenti\Bob\Documenti\argomento_1' => ['argomento' => 'DBMS', 'mese' => 'dicembre'],
        'C:\Utenti\Bob\Documenti\argomento_2' => ['argomento' => 'PHP' , 'mese' => 'gennaio'],
        ],
    'Sistemi' => [
        'C:\Utenti\Alex\Documenti\argomento_1' => ['argomento' => 'SVI', 'mese' => 'ottobre'],
        'C:\Utenti\Alex\Documenti\argomento_2' => ['argomento' => 'ACL' , 'mese' => 'novembre'],
        'C:\Utenti\Alex\Documenti\argomento_3' => ['argomento' => 'FIREWALL' , 'mese' => 'marzo'],
    ],
    'TPSIT' => [
        'C:\Utenti\John\Documenti\argomento_1' => ['argomento' => 'SOCKET' , 'mese' => 'settembre'],
    ]
];

function getArgomentoMese($materie, $materia, $percorso){
    if(isset($materie[$materia])){
        if(isset($materie[$materia][$percorso])){
            return [
                'mese' =>$materie[$materia][$percorso]['mese'],
                'argomento'=>$materie[$materia][$percorso]['argomento']
            ];
        }else{
            return [
                'errore' => 'Percorso non trovato'
            ];
        }
    }else{
        return [
            'errore' => 'Disciplina non trovata'
        ];
    }
}

$result = getArgomentoMese($materie, 'Sistemi', 'C:\Utenti\Alex\Documenti\argomento_2');
print_r($result);





