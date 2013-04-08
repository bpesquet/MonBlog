<?php

require_once 'Modele/Modele.php';

/**
 * Classe modélisant un commentaire de billet
 *
 * @author Baptiste Pesquet
 */
class Commentaire extends Modele
{
    /**
     * Renvoie la liste des commentaires associés à un billet
     * 
     * @param type $idBillet L'identifiant du billet (entier)
     * @return type La liste des commentaire (objet PDOStatement)
     */
    public function lireListe($idBillet)
    {
        return $this->executerLecture(
            'select * from T_COMMENTAIRE where BIL_ID=' . $idBillet);
    }
    
    /**
     * Ajoute un nouveau commentaire pour un billet
     * 
     * @param type $auteur L'auteur du commentaire (chaîne)
     * @param type $commentaire Le commentaire (chaîne)
     * @param type $idBillet L'identifiant du billet (entier)
     */
    public function ajouter($auteur, $commentaire, $idBillet)
    {
        // Définition de la date du commentaire à la date courante
        $date = date(DATE_W3C);
        $this->executerModification('insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID) values (?, ?, ?, ?)',
            array($date, $auteur, $commentaire, $idBillet));
    }
}

