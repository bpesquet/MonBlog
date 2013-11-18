<?php

require_once 'Framework/Controleur.php';

/**
 * Classe parente des contrôleurs soumis à authentification
 *
 * @author Baptiste Pesquet
 */
abstract class ControleurSecurise extends Controleur
{

    public function executerAction($action)
    {
        // Vérifie si les informations utilisateur sont présents dans la session
        // Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action continue normalement
        // Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
        if ($this->requete->getSession()->existeAttribut("idUtilisateur")) {
            parent::executerAction($action);
        }
        else {
            $this->rediriger("connexion");
        }
    }

}

