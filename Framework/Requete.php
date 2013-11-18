<?php

require_once 'Session.php';

/**
 * Classe modélisant une requête HTTP entrante.
 * 
 * @author Baptiste Pesquet
 */
class Requete
{
    /** Tableau des paramètres de la requête */
    private $parametres;

    /** Objet session associé à la requête */
    private $session;

    /**
     * Constructeur
     * 
     * @param array $parametres Paramètres de la requête
     */
    public function __construct($parametres)
    {
        $this->parametres = $parametres;
        $this->session = new Session();
    }

    /**
     * Renvoie l'objet session associé à la requête
     * 
     * @return Session Objet session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Renvoie vrai si le paramètre existe dans la requête
     * 
     * @param string $nom Nom du paramètre
     * @return bool Vrai si le paramètre existe et sa valeur n'est pas vide 
     */
    public function existeParametre($nom)
    {
        return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
    }

    /**
     * Renvoie la valeur du paramètre demandé
     * 
     * @param string $nom Nom d paramètre
     * @return string Valeur du paramètre
     * @throws Exception Si le paramètre n'existe pas dans la requête
     */
    public function getParametre($nom)
    {
        if ($this->existeParametre($nom)) {
            return $this->parametres[$nom];
        }
        else {
            throw new Exception("Paramètre '$nom' absent de la requête");
        }
    }

}

