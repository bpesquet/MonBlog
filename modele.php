<?php

// partie Modèle du blog
// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getBillets() {
    $bdd = getBDD();

//    $requete = "select * from T_BILLET order by BIL_ID desc";
//    
    // Bonus : affichage du nombre de commentaires
    $requete = "select B.BIL_ID, BIL_DATE, BIL_TITRE, BIL_CONTENU, COUNT(COM_ID) AS NB_COM 
        from T_BILLET B LEFT JOIN T_COMMENTAIRE C ON B.BIL_ID=C.BIL_ID 
        group by B.BIL_ID order by B.BIL_ID desc";

    $billets = $bdd->query($requete);
    return $billets;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBDD() {
    $bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8',
                    'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}