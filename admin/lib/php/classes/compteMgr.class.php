<?php

class compteManager extends compte {
    private $_db;
    private $_contactArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function addClient(array $data) {
        //var_dump($data);
        $query="select addclient(:nom_tf,:prenom_tf,:adresse_tf,:ville_tf,:cp_tf, :pays_tf, :num_tf) as retour" ;
        try {
            $id=null;
            $statement = $this->_db->prepare($query);
            
            $statement->bindValue(1, $data['nom_tf'], PDO::PARAM_STR);
            $statement->bindValue(2, $data['prenom_tf'], PDO::PARAM_STR);
            $statement->bindValue(3, $data['adresse_tf'], PDO::PARAM_STR);
            $statement->bindValue(4, $data['ville_tf'], PDO::PARAM_STR);
            $statement->bindValue(5, $data['cp_tf'], PDO::PARAM_INT);
            $statement->bindValue(6, $data['pays_tf'], PDO::PARAM_STR);
            $statement->bindValue(7, $data['num_tf'], PDO::PARAM_STR);

            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } 
        catch(PDOException $e) {
            print "Echec de l'insertion : ".$e;
            $retour=0;
            return $retour;
        }   
    }
    
    private function checkEmpty($data) {
        
        return true;
    }
    
}
