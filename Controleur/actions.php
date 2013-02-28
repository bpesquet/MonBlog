<?php

require 'Modele/modele.php';

// Affiche la liste de tous les billets du blog
function listerBillets() {
    $billets = getBillets();
    $lienBillet = "index.php?action=afficherBillet&id=";
    require 'Vue/listeBillets.php';
}

// Affiche un billet et tous ses commentaires
function afficherBillet($id) {
    $billet = getBillet($id);
    $commentaires = getCommentaires($id);
    require 'Vue/detailsBillet.php';
}

// Affiche une erreur
function afficherErreur($msgErreur)
{
    require 'Vue/erreur.php';
}