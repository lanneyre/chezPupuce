<?php
    class Fournisseur extends Personne{

        protected $codeComptable;

        static $tableau_fournisseur;

        function __construct($nom, $prenom, $mail, $adresse, $Cp, $ville, $date, $codeComptable){
            parent::__construct($nom, $prenom, $mail, $adresse, $Cp, $ville, $date);

            $this->codeComptable = $codeComptable;
        } 
        
        static function read(){
            return self::$tableau_fournisseur;
        }

        public function new(){
            if(empty($this->id) || empty(self::$tableau_fournisseur[$this->id])){
                $this->id = uniqid("Pupuce_fourn_");
                self::$tableau_fournisseur[$this->id] = $this;
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
            if(empty(self::$tableau_fournisseur[$this->id])){
                return false;
            }else{
                unset(self::$tableau_fournisseur[$this->id]);
                return true;
            }
        }
    }