<?php
    require("includes/Autoloader.php");
    Autoloader::register();

    $nom = readline("Merci de rentrer un nom : ");
    $prenom = readline("Merci de rentrer un prenom : ");
    $mail = readline("Merci de rentrer un mail : ");
    $adresse = readline("Merci de rentrer une adresse : ");
    $cp = readline("Merci de rentrer un cp : ");
    $ville = readline("Merci de rentrer une ville : ");
    $dateNaissance = readline("Merci de rentrer une date de naissance : ");
    $mdp = readline("Merci de rentrer un mdp : ");

    $client1 = new Client($nom, $prenom, $mail, $adresse, $cp, $ville, $dateNaissance, $mdp);
    $client2 = new Client($nom, $prenom, $mail, $adresse, $cp, $ville, $dateNaissance, $mdp);
    
    var_dump(Client::read());

    $client1->new();
    $client2->new();

    var_dump(Client::read());

    // $client1->update();

    $client1->delete();

    var_dump(Client::read());

    // var_dump($client1->authentification());

    // $numSecu = readline("Merci de rentrer un numSecu : ");
    // $fonction = readline("Merci de rentrer une fonction : ");
    // $salaire = readline("Merci de rentrer un salaire : ");
    // $superieur = readline("Merci de rentrer un superieur : ");

    // $employe = new Employe($nom, $prenom, $mail, $adresse, $cp, $ville, $dateNaissance, $mdp, $numSecu, $fonction, $salaire, $superieur);
    // $employe->promotion(-5000, "larbin", "la poubelle");
    // $employe->new();

    // var_dump(Employe::read());