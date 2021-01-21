<?php

class Panier {

    protected $idClient;

    protected $tableau_panier = array();// contiendra les produits
    // Tableau de tableau contenant un objet de type Produit et une quantité

    function __get($name)
    {
        return $this->$name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }


    function deletePanier($idProduit = null){
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

    function newProduit($produit_id, $qte = 1)
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

    function validerPanier()
    {
        return true;
    }
}