<?php

// Renvoie la liste des billets du blog
function getBillets() {
    $bdd = getBdd();
    $billets = $bdd->query('select * from T_BILLET order by BIL_ID desc');
    return $billets;
}

// Renvoie les informations sur un billet
function getBillet($idBillet) {
    $bdd = getBdd();
    $billet = $bdd->query('select * from T_BILLET where BIL_ID=' . $idBillet);
    return $billet->fetch();  // Accès au premier élément résultat
}

// Renvoie la liste des commentaires associés à un billet
function getCommentaires($idBillet) {
    $bdd = getBdd();
    $commentaires = $bdd->query(
            'select * from T_COMMENTAIRE where BIL_ID=' . $idBillet);
    return $commentaires;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8', 'root',
            '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}