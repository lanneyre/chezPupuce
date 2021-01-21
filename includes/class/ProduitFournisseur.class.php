<?php
    class ProduitFournisseur{
        static $quantite = array();

        static function remplissage(){
            for ($i=0; $i < 20; $i+=rand(1,3)) { 
                # code...
                $ligne = array("codeComptable" => "4010005", "idProduit" => rand(1,4), "qte" => ($i*rand(1,100)));
                self::$quantite[] = $ligne;
            }
        }
    }