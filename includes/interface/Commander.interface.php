<?php

interface Commander{

    // public function getNomProduit();
    // public function getDescription();
    // public function getimage();

    // public function getPrix();
    // public function getQuantiteEnStock();

    public function getQuantiteByFournisseur($codeFournisseur);
    public function new();

    static function read();
	
}