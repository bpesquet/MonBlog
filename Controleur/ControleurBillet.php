<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

require_once 'Controleur/Controleur.php';

/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste
 */
class ControleurBillet extends Controleur
{
    private $billet;
    private $commentaire;
    
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }
    
    public function listerBillets()
    {
        $stmtBillets = $this->billet->lireTout();
        $lienBillet = "index.php?action=afficherBillet&id=";
        $this->genererVue('listeBillets', 
                array('stmtBillets' => $stmtBillets, 'lienBillet' => $lienBillet));
    }

    public function afficherBillet($id)
    {
        $billet = $this->billet->lire($id);
        $stmtCommentaires = $this->commentaire->lireListe($id);
        $this->genererVue('detailsBillet', 
                array('billet' => $billet, 'stmtCommentaires' => $stmtCommentaires));
    }
}

