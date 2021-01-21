<?php
class Produits implements Commander{
    
    protected $id_produit;
    protected $nom_produit;
    protected $description_produit;
    protected $image_produit;
    protected $prix_produit;
    protected $quantite_produit;

    static $compteur;
        
    public function __construct($np, $dp, $ip, $pp, $qes){
        $this->nom_produit = $np;
        $this->description_produit = $dp;
        $this->image_produit = $ip;
        $this->prix_produit = $pp;
        $this->quantite_produit = $qes;
        $this->id_produit = ++self::$compteur;
    }

    public function new(){
        Database::$tableau_produits[] = $this;
    }

    static function read(){
        return Database::$tableau_produits;
    }
    // public function getNomProduit(){
    //     echo $this->nom_produit;
    // }
    // public function getDescription(){
    //     echo $this->description_produit;
    // }
    // public function getimage(){
    //     echo $this->image_produit;
    // }
    // public function getPrix(){
    //     echo $this->prix_produit;
    // }
    // public function getQuantiteEnStock(){
    //     echo $this->prix_produit;
    // }

    function __get($name)
    {
        return $this->$name;
    }

    function __set($name, $value)
    {
        $this->$name = $value;
    }

    function getQuantiteByFournisseur($codeFournisseur){
        $qte = 0;
        //ProduitFournisseur::$quantite;
        foreach (Database::$quantite as $value) {
            # code...
            if($value["codeComptable"] == $codeFournisseur && $value["idProduit"] == $this->id_produit){
                $qte += $value["qte"];
            }
        }
        return $qte;
    }
}