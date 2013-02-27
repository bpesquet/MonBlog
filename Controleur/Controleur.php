<?php

/**
 * Classe abstraite Controleur
 *
 * @author Baptiste
 */
abstract class Controleur {

    protected function genererVue($vue, $donnees) {
        $fichierVue = 'Vue/' . $vue . '.php';
        if (file_exists($fichierVue)) {
            extract($donnees);
            require $fichierVue;
        }
        else
            throw new Exception("Fichier $fichierVue non trouvé");
    }

    protected function afficherErreur($msgErreur) {
        require 'Vue/erreur.php';
    }

    protected function identifierAction() {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            return $action;
        }
        else
            throw new Exception("Aucune action définie");
    }
 
//    protected function getParametreUrl() {
//        
//    }
//    
//    protected function getParametreRequete() {
//        
//    }
    
    protected function recupererVariable($variable) {
        if (isset($variable)) {
            return htmlentities($variable, ENT_QUOTES);
        }
        else
            throw new Exception("Variable $variable non définie");
    }

}
