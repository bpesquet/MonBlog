<?php

require_once 'Modele/Billet.php';
require_once 'Framework/Controleur.php';

class ControleurAccueil extends Controleur {

    private $billet;

    public function __construct($action, Requete $requete) {
        parent::__construct($action, $requete);
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function index() {
        $billets = $this->billet->getBillets();
        $this->genererVue(array('billets' => $billets));
    }

}

