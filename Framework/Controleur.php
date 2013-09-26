<?php

/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 * 
 * @author Baptiste Pesquet
 */
abstract class Controleur {

    // Action à réaliser (définie par le routeur)
    private $action;
    // Requête entrante
    protected $requete;

    public function __construct($action, Requete $requete) {
        $this->action = $action;
        $this->requete = $requete;
    }

    /**
     * Exécute l'action à réaliser
     * 
     * @return type
     * @throws Exception
     */
    public function executerAction() {
        if (method_exists($this, $this->action)) {
            return $this->{$this->action}();
        }
        else {
            $classeControleur = get_class($this);
            throw new Exception("Erreur interne : action '$this->action' non définie dans la classe $classeControleur");
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
    public abstract function index();
    
    /**
     * Génère la vue associée au contrôleur courant
     * 
     * @param type $donneesVue les éventuels données utilisées par la vue
     */
    protected function genererVue($donneesVue = array()) {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("Controleur", "", $classeControleur);

        $vue = new Vue($this->action, $controleur);
        $vue->generer($donneesVue);
    }

}
