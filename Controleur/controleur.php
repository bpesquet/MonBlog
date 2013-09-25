<?php

require 'Modele/modele.php';

// Affiche la liste de tous les billets du blog
function accueil() {
    $billets = getBillets();
    $lienBillet = "index.php?action=billet&id=";
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function billet($idBillet) {
    $billet = getBillet($idBillet);
    $commentaires = getCommentaires($idBillet);
    require 'Vue/vueBillet.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}
