<?php

/**
 * Classe abstraite Controleur
 *
 * @author Baptiste
 */
abstract class Controleur {

    protected function genererVue($vue, $donnees = array()) {
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
 
    protected function getParametreUrl($nomParametre) {
        if (isset($_GET[$nomParametre])) {
            $param = htmlentities($_GET[$nomParametre], ENT_QUOTES);
            return $param;
        }
        else
            throw new Exception("Paramètre '$nomParametre' absent de l'URL");
    }
}
