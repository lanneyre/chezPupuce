<?php
class Client extends Personne {
    private  $dateCreationCompte;
    
    static $compteur = 0;
        // function __construct($nom, $prenom, $mail, $adresse, $Cp, $ville, $date, $motDePasse){
        //     parent::__construct($nom, $prenom, $mail, $adresse, $Cp, $ville, $date, $motDePasse);
        // } 
    
        public function new(){
            if(empty($this->id) || empty(Database::$tableau_client[$this->id])){
                $this->dateCreationCompte = new DateTime();
                $this->id = ++self::$compteur; //uniqid("Pupuce_");
                Database::$tableau_client[$this->id] = $this;
                return true;
            } else {
                return false;
            }       
        }
        static function read(){
            return Database::$tableau_client;
        }
        function update(){
            $information = array("nom"=> $this->nom, "prenom"=> $this->prenom, "mail"=> $this->mail, "cp" => $this->cp, "motDePasse" => $this->motDePasse);
            $this->modifierInfo($information);
            return true;
        }
        function delete(){
            if(empty(Database::$tableau_client[$this->id])){
                return false;
            }else{
                unset(Database::$tableau_client[$this->id]);
                return true;
            }
        }

        function authentification(){
            if($this->mail == "tata@toto.titi" && $this->motDePasse == "superMotDePasse"){
                return true;
            } else {
                return false;
            }
        }

        static function getClientById($idClient){
            return Database::getClientById($idClient);
        }
    }