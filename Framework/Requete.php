<?php

/*
 * Classe modélisant une requête HTTP entrante
 * 
 * @version 1.0
 * @author Baptiste Pesquet
 */
class Requete {

    /** Tableau des paramètres de la requête */
    private $parametres;

    /**
     * Constructeur
     * 
     * @param array $parametres Paramètres de la requête
     */
    public function __construct($parametres) {
        $this->parametres = $parametres;
    }

    /**
     * Renvoie vrai si le paramètre existe dans la requête
     * 
     * @param string $nom Nom du paramètre
     * @return bool Vrai si le paramètre existe et sa valeur n'est pas vide 
     */
    public function existeParametre($nom) {
        return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
    }

    /**
     * Renvoie la valeur du paramètre demandé
     * 
     * @param string $nom Nom d paramètre
     * @return string Valeur du paramètre
     * @throws Exception Si le paramètre n'existe pas dans la requête
     */
    public function getParametre($nom) {
        if ($this->existeParametre($nom)) {
            return $this->parametres[$nom];
        }
        else {
            throw new Exception("Paramètre '$nom' absent de la requête");
        }
    }

}

