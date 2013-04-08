<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

require_once 'Controleur/Controleur.php';

/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste Pesquet
 */
class ControleurBillet extends Controleur
{
    private $billet;
    private $commentaire;
    
    /**
     *Constructeur 
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }
    
    /**
     * Affiche la liste des billets du blog 
     */
    public function listerBillets()
    {
        $billets = $this->billet->lireTout();
        // Lien vers le détail d'un billet
        $lienBillet = "index.php?action=afficherBillet&id=";
        $this->genererVue('listeBillets', 
                array('billets' => $billets, 'lienBillet' => $lienBillet));
    }

    /**
     * Affiche le détail d'un billet du blog
     * 
     * @param type $id L'identifiant du billet à afficher (entier)
     */
    public function afficherBillet($id)
    {
        $billet = $this->billet->lire($id);
        $commentaires = $this->commentaire->lireListe($id);
        $this->genererVue('detailsBillet', 
                array('billet' => $billet, 'commentaires' => $commentaires));
    }
    
    /**
     * Ajoute un commentaire sur un billet
     * 
     * @param type $auteur L'auteur du commentaire (chaîne)
     * @param type $commentaire Le commentaire (chaîne)
     * @param type $idBillet L'identifiant du billet (entier)
     */
    public function ajouterCommentaire($auteur, $commentaire, $idBillet) {
        $this->commentaire->ajouter($auteur, $commentaire, $idBillet);
        $this->afficherBillet($idBillet);
    }
}

