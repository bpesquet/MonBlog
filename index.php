<?php

require 'modele.php';

try {
    $stmtBillets = getBillets();    // Utilisation des services du modèle
    $lienBillet = "billet.php?id="; // Lien vers la page contrôleur billet
    require 'listeBillets.php';     // Génération de la vue associée
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();  // Création du message d'erreur
    require 'erreur.php';           // Génération de la vue d'erreur
}

