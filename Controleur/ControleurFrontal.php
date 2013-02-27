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
            if (!empty($_POST)) {
                $this->routerRequetePost();
            }
            elseif (!empty($_GET)) {
                $this->routerRequeteGet();
            }
            else {
                $this->ctrlBillet->listerBillets();  // action par défaut
            }
        }
        catch (Exception $e) {
            $this->afficherErreur($e->getMessage());
        }
    }

    private function routerRequetePost() {
        if (isset($_POST['auteur'])
                And isset($_POST['commentaire'])
                And isset($_POST['idBillet'])) {
            $auteur = strip_tags($_POST['auteur']);
            $commentaire = strip_tags($_POST['commentaire']);
            $idBillet = intval($_POST['idBillet']);
            if ($idBillet != 0)
                $this->ctrlBillet->ajouterCommentaire($auteur, $commentaire, $idBillet);
            else {
                $id = strip_tags($_POST['id']);
                throw new Exception("Identifiant de billet '$id' non valide");
            }
        }
        else
            throw new Exception('Paramètres $_POST non reconnus');
    }

    private function routerRequeteGet() {
        $action = $this->identifierAction();
        switch ($action) {
            case 'afficherBillet' :
                $idBillet = $this->recupererVariable($_GET['id']);
                if ($idBillet != 0)
                    $this->ctrlBillet->afficherBillet($idBillet);
                else {
                    throw new Exception("Identifiant de billet '$idBillet' non valide");
                }
                break;
            default :
                throw new Exception("Action '$action' non valide");
                break;
        }
    }

}

