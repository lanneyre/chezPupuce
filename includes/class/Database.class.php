<?php
    class Database
    {
        // Clients
        static $tableau_client;

        static function getAllClients(){
            return self::$tableau_client;
        }

        // Employés
        static $tableau_employe;

        static function getAllEmploye(){
            return self::$tableau_employe;
        }

        // Fournisseurs
        static $tableau_fournisseur;

        static function getAllFournisseur(){
            return self::$tableau_fournisseur;
        }

        static function getFournisseurById($codeComptable){
            foreach (self::$tableau_fournisseur as $fournisseur) {
                # code...
                if($fournisseur->codeComptable == $codeComptable){
                    return $fournisseur;
                }
            }
            return false;
        }

        // produits
        static $tableau_produits;

        static function getAllProduits(){
            return self::$tableau_produits;
        }

        static function getProduitsById($id){
            foreach (self::$tableau_produits as $produit) {
                # code...
                if($produit->id_produit == $id){
                    return $produit;
                }
            }
            return false;
        }

        // ProduitFournisseur
        static $quantite = array();
        
        static function remplissage(){
            for ($i=0; $i < 20; $i+=rand(1,3)) { 
                # code...
                $ligne = array("codeComptable" => "4010005", "idProduit" => rand(1,4), "qte" => ($i*rand(1,100)));
                self::$quantite[] = $ligne;
            }

            $fournisseur = new Fournisseur("MonFournisseur", "Quitue", "monfournisseur@quitue.org", "22 Rue des suicidés", "06000", "Nice", "21/01/2021", "4010005");
            $fournisseur->new();

            $p1 = new Produits("truc", "truc", "imagesDeTruc", 42, 3);
            $p2 = new Produits("machin", "machin", "imagesDemachin", 22, 13);
            $p3 = new Produits("bidule", "bidule", "imagesDebidule", 82, 39);
            $p4 = new Produits("choses", "choses", "imagesDechoses", 546, 113);

            $p1->new();
            $p2->new();
            $p3->new();
            $p4->new();
        }
    }
    