<?php
class Commande
{
    private $numCommande;
    private $dateCommande;
    private $dateLivraison;
    private $numPanier;   

    function __construct($numPanier)
    {
        $this->numCommande = uniqid("Commande_chez_pupuce_");
        $this->dateCommande = new DateTime();
        $this->dateLivraison = (new DateTime())->add(new DateInterval('P15D'));
        $this->numPanier = $numPanier;
    }

    function getFacture(){
        return $this;
    }

    function save(){
        if(empty(Database::$tableau_commandes[$this->numCommande])){
            Database::$tableau_commandes[$this->numCommande] = $this;
            return true;
        } else {
            return false;
        } 
    }

    static function read(){
        return Database::getAllCommandes();
    }
}
