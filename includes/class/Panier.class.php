<?php

class Panier {

    private $idClient;
    private $numPanier;

    private $tableau_panier = array();// contiendra les produits
    // Tableau de tableau contenant un objet de type Produit et une quantité

    function __get($name)
    {
        return $this->$name;
    }

    function __set($name, $value):void
    {
        $this->$name = $value;
    }


    function deletePanier($idProduit = null):bool{
        // if(empty($this->tableau_panier[$this->id])){
        //     return false;
        // }else{
        //     unset($this->tableau_panier[$this->id]);
        //     return true;
        // }
        if(empty($idProduit)){
            $this->tableau_panier = array();
            return true;
        } else {
            unset($this->tableau_panier[$idProduit]);
            return true;
        }
        
    }

    function newProduit($produit_id, $qte = 1):void
    {
        $prod = Produits::getProduitsById($produit_id);
        if($prod->quantite_produit >= $qte){
            $q = $qte;
        } else {
            $q = $prod->quantite_produit;
        }

        $prod->quantite_produit -= $q;
        if(isset($this->tableau_panier[$produit_id])){
            $this->tableau_panier[$produit_id]["Qte"] += $q; 
        } else {
            $this->tableau_panier[$produit_id] = array("produit" => $prod, "Qte" => $q);
        }

        if($this->tableau_panier[$produit_id]["Qte"] <= 0){
            $this->deletePanier($produit_id);
        }
    }

    function calculTotalHT():float{
        $prix=0.0;
        foreach($this->tableau_panier as $val)
        {
            $prix += $val["Qte"] * $val["produit"]->prix_produit;
        }
        //echo $prix."\n";
        return $prix;
    }

    function calculTotalTTC():float{
        return $this->calculTotalHT()*(1+Database::TAUX_TVA);
    }

    function save(){
        if(empty(Database::$tableau_panier[$this->numPanier])){
            Database::$tableau_panier[$this->numPanier] = $this;
            return true;
        } else {
            return false;
        } 
    }

    function validerPanier()
    {
        if(empty($this->idClient)){
            return "Connecte toi (autocensure)!";
        }

        $this->numPanier = uniqid("Panier_chez_pupuce_");

        $com = new Commande($this->numPanier);
        
        if($com->save() && $this->save()){
            // $this->deletePanier();
            // unset($this->numPanier);
            return true;
        } else {
            return false;
        }
    }

    static function read(){
        return Database::getAllPanier();
    }
    static function getPanierByNum($numPanier){
        return Database::getPanierByNum($numPanier);
    }
}