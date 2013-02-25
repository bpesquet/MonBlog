<?php

require_once 'Modele/Modele.php';

/**
 * Description of ModeleCommentaire
 *
 * @author Baptiste
 */
class ModeleCommentaire extends Modele
{

    public function compter($idBillet)
    {
        return $this->executerLecture('select count(*) AS NB_COM from T_COMMENTAIRE where BIL_ID=' . $idBillet, true);
    }

    public function lire($idBillet)
    {
        return $this->executerLecture('select * from T_COMMENTAIRE where BIL_ID=' . $idBillet);
    }

    public function ajouter($auteur, $commentaire, $idBillet)
    {
        $date = date(DATE_W3C);
        $this->executerModification('insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID) values (?, ?, ?, ?)',
            array($date, $auteur, $commentaire, $idBillet));
    }

}

