<?php

require 'Controleur/ControleurBillet.php';

/**
 * Contrôleur frontal du blog
 *
 * @author Baptiste Pesquet
 */
class ControleurFrontal extends Controleur {

    private $ctrlBillet;

    /**
     * Constructeur 
     */
    public function __construct() {
        $this->ctrlBillet = new ControleurBillet();
    }

    /**
     * Méthode appelée lors de chaque demande de page sur le site.
     * Examine les paramètres de l'URL et détermine l'action à entreprendre 
     */
    public function routerRequete() {
        try {
            if (!empty($_GET)) {
                $this->executerAction();
            }
            elseif (!empty($_POST)) {
                $this->validerFormulaire();
            }
            else {
                $this->ctrlBillet->listerBillets();  // action par défaut
            }
        }
        catch (Exception $e) {
            $this->afficherErreur($e->getMessage());
        }
    }

    /**
     * Exécute une action
     * 
     * @throws Exception Si aucune action n'est reconnue dans les paramètres de l'URL
     */
    private function executerAction() {
        $action = $this->getParametreUrl('action');
        switch ($action) {
            case 'afficherBillet' :
                $param = $this->getParametreUrl('id');
                // On récupère la valeur entière du paramètre de l'URL
                $idBillet = intval($param);
                if ($idBillet != 0)
                    $this->ctrlBillet->afficherBillet($idBillet);
                else {
                    throw new Exception("Identifiant de billet '$param' non valide");
                }
                break;
            default :
                throw new Exception("Action '$action' non valide");
                break;
        }
    }

    /**
     * Valide un formulaire du blog
     * 
     * @throws Exception En cas d'erreur dans les données du formulaire
     */
    private function validerFormulaire() {
        $auteur = $this->getParametreRequete('auteur');
        $commentaire = $this->getParametreRequete('commentaire');
        $param = $this->getParametreRequete('idBillet');
        // On récupère la valeur entière du paramètre de la requête
        $idBillet = intval($param);
        if ($idBillet != 0)
            $this->ctrlBillet->ajouterCommentaire($auteur, $commentaire, $idBillet);
        else
            throw new Exception("Identifiant de billet '$param' non valide");
    }

}

