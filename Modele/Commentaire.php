<?php

require_once 'Modele/Modele.php';

/**
 * Classe modélisant un commentaire de billet
 *
 * @author Baptiste
 */
class Commentaire extends Modele
{
    // Renvoie la liste des commentaires associés à un billet
    public function lireListe($idBillet)
    {
        return $this->executerLecture(
            'select * from T_COMMENTAIRE where BIL_ID=' . $idBillet);
    }
}

