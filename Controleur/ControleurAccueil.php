<?php

require_once 'Modele/Billet.php';
require_once 'Framework/Vue.php';

class ControleurAccueil extends Controleur {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function index() {
        $billets = $this->billet->getBillets();
        $lienBillet = "/billet/index/";
        $this->genererVue(array('billets' => $billets, 'lienBillet' => $lienBillet));
    }

}

