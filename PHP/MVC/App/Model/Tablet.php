<?php
namespace App\Model;
//tante classi quante sono le tabelle
use Exception;
use PDO;
class Tablet
{
    private PDO $db;
    public function __construct($db){
        $this->db=$db;
    }
    //metodi che corrispondono al CRUD
    public function showAll():array{
        $listOfTablet = [];
        $query = 'SELECT * FROM Tablet';
        try {
            $stm = $this->db->prepare($query);
            $stm->execute();
            while ($product = $stm->fetch()){
                $listOfTablet[] = $product;
            }
            $stm->closeCursor();
        }catch(Exception $e){

        }
        return $listOfTablet;
    }
}