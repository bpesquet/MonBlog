<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Billet.php';

class ControleurAccueil extends Controleur {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $billets = $this->billet->getBillets();
        $this->genererVue(array('billets' => $billets));
    }

}

