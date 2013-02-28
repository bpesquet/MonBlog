<?php

require 'Controleur/ControleurBillet.php';

/**
 * Description of ControleurFrontal
 *
 * @author Baptiste
 */
class ControleurFrontal extends Controleur {

    private $ctrlBillet;

    public function __construct() {
        $this->ctrlBillet = new ControleurBillet();
    }

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

    private function executerAction() {
        $action = $this->getParametreUrl('action');
        switch ($action) {
            case 'afficherBillet' :
                $param = $this->getParametreUrl('id');
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

    private function validerFormulaire() {
        $auteur = $this->getParametreRequete('auteur');
        $commentaire = $this->getParametreRequete('commentaire');
        $param = $this->getParametreRequete('idBillet');
        $idBillet = intval($param);
        if ($idBillet != 0)
            $this->ctrlBillet->ajouterCommentaire($auteur, $commentaire, $idBillet);
        else
            throw new Exception("Identifiant de billet '$param' non valide");
    }

}

