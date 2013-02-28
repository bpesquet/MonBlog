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
    
    // Ajoute un nouveau commentaire pour un billet
    public function ajouter($auteur, $commentaire, $idBillet)
    {
        $date = date(DATE_W3C);
        $this->executerModification('insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID) values (?, ?, ?, ?)',
            array($date, $auteur, $commentaire, $idBillet));
    }
}

