<?php

/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 * 
 * @author Baptiste Pesquet
 */
abstract class Controleur {

    /**
     * Génère une vue (fichier HTML contenant des éléments dynamiques PHP)
     * 
     * @param type $vue Le nom de la vue (nom du fichier dans le répertoire Vue/, sans extension)
     * @param type $donnees Le tableau des données dynamiques utilisées par la vue 
     * @throws Exception Si le fichier vue est introuvable
     */
    protected function genererVue($vue, $donnees = array()) {
        $fichierVue = 'Vue/' . $vue . '.php';
        if (file_exists($fichierVue)) {
            extract($donnees);
            require $fichierVue;
        }
        else
            throw new Exception("Fichier $fichierVue non trouvé");
    }

    /**
     * Affiche la vue d'erreur
     * 
     * @param type $msgErreur Le message d'erreur affiché dans la vue
     */
    protected function afficherErreur($msgErreur) {
        require 'Vue/erreur.php';
    }
 
    /**
     * Récupère un paramètre de l'URL (recherche dans $_GET)
     * 
     * @param type $nomParametre Le nom du paramètre
     * @return type La valeur du paramètre (string)
     * @throws Exception Si le paramètre est introuvable dans l'URL
     */
    protected function getParametreUrl($nomParametre) {
        if (isset($_GET[$nomParametre])) {
            // Protection contre l'injection de code
            $param = htmlentities($_GET[$nomParametre], ENT_QUOTES);
            return $param;
        }
        else
            throw new Exception("Paramètre '$nomParametre' absent de l'URL");
    }
    
    /**
     * Récupère un paramètre de la requête HTTP (recherche dans $_POST)
     * 
     * @param type $nomParametre Le nom du paramètre
     * @return type La valeur du paramètre (string)
     * @throws Exception Si le paramètre est introuvable dans la requête
     */
    protected function getParametreRequete($nomParametre) {
        if (isset($_POST[$nomParametre])) {
            // Protection contre l'injection de code
            $param = htmlentities($_POST[$nomParametre], ENT_QUOTES);
            return $param;
        }
        else
            throw new Exception("Paramètre '$nomParametre' absent de la requête");
    }
}
