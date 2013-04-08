<?php

require_once 'Modele/Modele.php';

/**
 * Classe modélisant un billet de blog
 *
 * @author Baptiste Pesquet
 */
class Billet extends Modele
{
    /**
     * Renvoie la liste des billets
     * 
     * @return type La liste des billets (objet PDOStatement)
     */
    public function lireTout()
    {
        return $this->executerLecture(
            'select * from T_BILLET order by BIL_ID desc');
    }

    // Renvoie un billet identifié
    /**
     * Renvoie un billet du blog
     * 
     * @param type $id L'identifiant du billet (entier)
     * 
     * @return type Le billet (tableau associatif)
     */
    public function lire($id)
    {
        return $this->executerLecture(
            'select * from T_BILLET where BIL_ID=' . $id, true);
    }
}
