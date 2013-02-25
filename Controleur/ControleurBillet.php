<?php

require_once 'Modele/ModeleBillet.php';
require_once 'Modele/ModeleCommentaire.php';

require_once 'Controleur/Controleur.php';

/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste
 */
class ControleurBillet extends Controleur
{
    private $modeleBillet;
    private $modeleCommentaire;
    
    public function __construct()
    {
        $this->modeleBillet = new ModeleBillet();
        $this->modeleCommentaire = new ModeleCommentaire();
    }
    
    public function listerBillets()
    {
        // Solution simple au problème du comptage des commentaires par billet : cf ModeleBillet
        $billets = $this->modeleBillet->lireTout();
        
        /*
        // Solution complexe au problème du comptage des commentaires par billet
        // Récupération de la liste des billets sous la forme d'un objet PDOStatement
        $resultatsBillets = $this->modeleBillet->lireTout();
        // Accès aux lignes de résultats (les billets du blog) sous la forme d'un tableau
        $billets = $resultatsBillets->fetchAll();
        // Ajout du nombre de commentaires pour chaque billet du blog
        // Le symbole &, indispensable, indique un passage par référence
        foreach ($billets as &$billet) {
            $resultatsCom = $this->modeleCommentaire->compter($billet['BIL_ID']);
            $billet['NB_COM'] = $resultatsCom['NB_COM'];
        }*/
        
        $lienBillet = "index.php?action=afficherBillet&id=";
        $this->genererVue('listeBillets', 
                array('billets' => $billets, 'lienBillet' => $lienBillet));
    }

    public function afficherBillet($id)
    {
        $billet = $this->modeleBillet->lireUnSeul($id);
        $commentaires = $this->modeleCommentaire->lire($id);
        $this->genererVue('detailsBillet', 
                array('billet' => $billet, 'commentaires' => $commentaires));
    }

    public function ajouterCommentaire($auteur, $commentaire, $idBillet) {
        $this->modeleCommentaire->ajouter($auteur, $commentaire, $idBillet);
        $this->afficherBillet($idBillet);
    }
}

