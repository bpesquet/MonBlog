<?php

// partie Modèle du blog

// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getBillets() {
    $bdd = getBDD();
    $requeteBillets = "select * from T_BILLET order by BIL_ID desc";
    $stmtBillets = $bdd->query($requeteBillets);
    return $stmtBillets;
}

// Renvoie les informations sur un billet
function getBillet($idBillet)
{
    $bdd = getBDD();
    $stmtBillet = $bdd->query('select * from T_BILLET where BIL_ID=' . $idBillet);
    $billet = $stmtBillet->fetch();  // Accès au premier élément résultat
    return $billet;
}

// Renvoie la liste des commentaires associés à un billet
function getCommentaires($idBillet)
{
    $bdd = getBDD();
    $stmtCommentaires = $bdd->query('select * from T_COMMENTAIRE where BIL_ID=' . $idBillet);
    return $stmtCommentaires;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBDD() {
    $bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8',
                    'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}
