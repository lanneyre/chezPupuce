<?php
    class Fournisseur extends Personne{

        protected $codeComptable;
        static $compteur;

        function __construct($nom, $prenom, $mail, $adresse, $Cp, $ville, $date, $codeComptable){
            parent::__construct($nom, $prenom, $mail, $adresse, $Cp, $ville, $date);

            $this->codeComptable = $codeComptable;
        } 
        
        static function read(){
            return Database::$tableau_fournisseur;
        }

        public function new(){
            if(empty($this->id) || empty(Database::$tableau_fournisseur[$this->id])){
                $this->id = uniqid("Pupuce_fourn_");
                Database::$tableau_fournisseur[$this->id] = $this;
                return true;
            } else {
                return false;
            }       
        }
        function update(){
            $information = array("nom"=> $this->nom, "prenom"=> $this->prenom, "mail"=> $this->mail, "cp" => $this->cp, "CodeComptable" => $this->codeComptable);
            $this->modifierInfo($information);
            return true;
        }
        function delete(){
            if(empty(Database::$tableau_fournisseur[$this->id])){
                return false;
            }else{
                unset(Database::$tableau_fournisseur[$this->id]);
                return true;
            }
        }

        static function getFournisseurById($codeComptable){
            return Database::getFournisseurById($codeComptable);
        }

        function getQuantiteByProduit($idProduit){
            $qte = 0;
            // var_dump($this);
            //ProduitFournisseur::$quantite;
            foreach (Database::$quantite as $value) {
                # code...
                if($value["codeComptable"] == $this->codeComptable && $value["idProduit"] == $idProduit){
                    $qte += $value["qte"];
                }
            }
            return $qte;
        }
    }