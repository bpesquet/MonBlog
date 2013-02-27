<?php

require 'modele.php';

try {
    if (isset($_GET['id'])) {
        // Renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET['id']);  
        if ($id != 0) {
            $billet = getBillet($id);
            $stmtCommentaires = getCommentaires($id);
            require 'detailsBillet.php';
        }
        else
            throw new Exception("Identifiant de billet incorrect");
    }
    else
        throw new Exception("Aucun identifiant de billet");
}
catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'erreur.php';
}
