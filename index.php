<?php
    require("includes/Autoloader.php");
    Autoloader::register();

    /*$nom = readline("Merci de rentrer un nom : ");
    $prenom = readline("Merci de rentrer un prenom : ");
    $mail = readline("Merci de rentrer un mail : ");
    $adresse = readline("Merci de rentrer une adresse : ");
    $cp = readline("Merci de rentrer un cp : ");
    $ville = readline("Merci de rentrer une ville : ");
    $dateNaissance = readline("Merci de rentrer une date de naissance : ");
    $mdp = readline("Merci de rentrer un mdp : ");

    // $client1 = new Client($nom, $prenom, $mail, $adresse, $cp, $ville, $dateNaissance, $mdp);
    // $client2 = new Client($nom, $prenom, $mail, $adresse, $cp, $ville, $dateNaissance, $mdp);
    
    // var_dump(Client::read());

    // $client1->new();
    // $client2->new();

    // var_dump(Client::read());

    // $client1->update();

    // $client1->delete();

    // var_dump(Client::read());

    // var_dump($client1->authentification());

    // $numSecu = readline("Merci de rentrer un numSecu : ");
    // $fonction = readline("Merci de rentrer une fonction : ");
    // $salaire = readline("Merci de rentrer un salaire : ");
    // $superieur = readline("Merci de rentrer un superieur : ");

    // $employe = new Employe($nom, $prenom, $mail, $adresse, $cp, $ville, $dateNaissance, $mdp, $numSecu, $fonction, $salaire, $superieur);
    // $employe->promotion(-5000, "larbin", "la poubelle");
    // $employe->new();

    // var_dump(Employe::read());

    $codeComptable = readline("Merci de rentrer un code comptable : ");

    $fournisseur = new Fournisseur($nom, $prenom, $mail, $adresse, $cp, $ville, $dateNaissance, $codeComptable);

    // var_dump(Fournisseur::read());

    $fournisseur->new();*/

    // var_dump(Fournisseur::read());

    // $fournisseur->update();
    
    // var_dump(Fournisseur::read());

    $fournisseur = new Fournisseur("MonFournisseur", "Quitue", "monfournisseur@quitue.org", "22 Rue des suicidés", "06000", "Nice", "21/01/2021", "4010005");

    $p1 = new Produits("truc", "truc", "imagesDeTruc", 42, 3);
    $p2 = new Produits("machin", "machin", "imagesDemachin", 22, 13);
    $p3 = new Produits("bidule", "bidule", "imagesDebidule", 82, 39);
    $p4 = new Produits("choses", "choses", "imagesDechoses", 546, 113);

    $p1->new();
    $p2->new();
    $p3->new();
    $p4->new();

    //var_dump(Produits::read());
    ProduitFournisseur::remplissage();

    // var_dump(ProduitFournisseur::$quantite);
    
    echo $p1->getQuantiteByFournisseur($fournisseur->codeComptable);