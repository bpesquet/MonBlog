<?php   // partie Contrôleur du blog

require 'modele.php';

try {
    $stmtBillets = getBillets();    // Utilisation des services du modèle
    require 'listeBillets.php';     // Génération de la vue associée
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();  // Création du message d'erreur
    require 'erreur.php';           // Génération de la vue d'erreur
}

