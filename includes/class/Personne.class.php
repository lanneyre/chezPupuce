<?php

	abstract class Personne
	{
		protected $nom;
		protected $prenom;
		protected $mail;
		protected $adresse;
		protected $cp;
		protected $ville;
		protected $dateNaissance;
		protected $id;
		protected $motDePasse;

		function __construct($u_Nom, $u_Prenom, $u_Mail, $u_Adresse, $u_Code_Postal, $u_Ville, $u_Date_De_Naissance, $u_mdp = null){
			$this->nom = $u_Nom;
			$this->prenom = $u_Prenom;
			$this->mail = $u_Mail;
			$this->adresse = $u_Adresse;
			$this->cp = $u_Code_Postal;
			$this->ville = $u_Ville;
			$this->dateNaissance = $u_Date_De_Naissance;
			$this->motDePasse = $u_mdp;
		}
		

		function modifierInfo(array $information)
		{
			foreach ($information as $attribut => $value) 
			{
				$input = readline("Voulez-vous modifier " . $attribut . " " . $value . " ? (oui, non) ");
				if($input == "oui")
				{
					$input = readline("Par quoi voulez-vous remplacer ? ");
					$this->$attribut = $input;
				}
			}
		}

		function __get($name)
		{
			return $this->$name;
		}

		function __set($name, $value)
		{
			if($name!="id"){
				$this->$name = $value;
			}	
		}

		function __call($name, $arguments)
		{
			echo "la fonction ".$name." n'existe pas";
		}
	}