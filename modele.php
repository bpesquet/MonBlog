<?php

// partie Modèle du blog
// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getBillets() {
    $bdd = getBDD();
    $requeteBillets = "select * from T_BILLET order by BIL_ID desc";
    $stmtBillets = $bdd->query($requeteBillets);
    return $stmtBillets;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBDD() {
    $bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8',
                    'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}