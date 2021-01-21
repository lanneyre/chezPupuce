<?php
    class ProduitFournisseur{
        static $quantite = array();

        static function remplissage(){
            for ($i=1; $i <= 20; $i+=rand(1,3)) { 
                # code...
                $ligne = array("codeComptable" => "401000".rand(4,6), "idProduit" => rand(1,4), "qte" => ($i*rand(1,100)));
                self::$quantite[] = $ligne;
            }
        }
    }