<?php

require 'Modele/modele.php';

// Affiche la liste de tous les billets du blog
function afficherAccueil() {
    $billets = getBillets();
    $lienBillet = "index.php?action=afficherBillet&id=";
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un billet
function afficherBillet($id) {
    $billet = getBillet($id);
    $commentaires = getCommentaires($id);
    require 'Vue/vueBillet.php';
}

// Affiche une erreur
function afficherErreur($msgErreur) {
    require 'Vue/vueErreur.php';
}
