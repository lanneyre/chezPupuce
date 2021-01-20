<?php
    class Employe extends Personne{

        private  $numSecu;
        private  $fonction;
        private  $salaire;
        private  $superieur;

        static $tableau_employe;

        function __construct($nom, $prenom, $mail, $adresse, $Cp, $ville, $date, $motDePasse, $numSecu, $fonction, $salaire, $superieur){
            parent::__construct($nom, $prenom, $mail, $adresse, $Cp, $ville, $date, $motDePasse);

            $this->numSecu = $numSecu;
            $this->fonction = $fonction;
            $this->salaire = $salaire;
            $this->superieur = $superieur;
        } 
        static function read(){
            return self::$tableau_employe;
        }

        public function new(){
            if(empty($this->id) || empty(self::$tableau_employe[$this->id])){
                $this->id = uniqid("Pupuce_emp_");
                self::$tableau_employe[$this->id] = $this;
                return true;
            } else {
                return false;
            }       
        }

        function update(){
            $information = array("mail"=> $this->mail, "cp" => $this->cp, "motDePasse" => $this->motDePasse, "salaire" => $this->salaire, "fonction" => $this->fonction);
            $this->modifierInfo($information);
            return true;
        }
        function delete(){
            if(empty(self::$tableau_employe[$this->id])){
                return false;
            }else{
                unset(self::$tableau_employe[$this->id]);
                return true;
            }
        }

        function authentification(){
            return ($this->mail == "emptata@toto.titi" && $this->motDePasse == "1234") ? true : false;
        }

        function promotion($augmentation, $newFunction = null, $superieur = null){
            $this->salaire += $augmentation;
            if(!empty($newFunction)){
                $this->fonction = $newFunction;
            }
            if(!empty($superieur)){
                $this->superieur = $superieur;
            }
                
        }
    }