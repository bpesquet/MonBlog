<?php

/**
 * Classe de gestion des paramètres de configuration
 * 
 * Inspirée du SimpleFramework de F. Guillot
 * (https://github.com/fguillot/simpleFramework)
 *
 * @author Baptiste Pesquet
 */
class Configuration {

    private static $parametres;

    /**
     * Renvoie la valeur d'un paramètre de configuration
     * 
     * @param type $nom
     * @param type $valeurParDefaut
     * @return type
     */
    public static function get($nom, $valeurParDefaut = null) {
        if (isset(self::getParametres()[$nom])) {
            $valeur = self::getParametres()[$nom];
        }
        else {
            $valeur = $valeurParDefaut;
        }
        return $valeur;
    }

    /**
     * Renvoie le tableau des paramètres en le chargeant au besoin
     * 
     * @return type
     * @throws Exception
     */
    private static function getParametres() {
        if (self::$parametres == null) {
            $cheminFichier = "Config/prod.ini";
            if (!file_exists($cheminFichier)) {
                $cheminFichier = "Config/dev.ini";
            }
            if (!file_exists($cheminFichier)) {
                throw new Exception("Erreur interne : aucun fichier de configuration trouvé");
            }
            else {
                self::$parametres = parse_ini_file($cheminFichier);
            }
        }
        return self::$parametres;
    }

}

