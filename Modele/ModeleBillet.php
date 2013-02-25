<?php

require_once 'Modele/Modele.php';

/**
 * Classe modélisant un billet de blog
 *
 * @author Baptiste
 */
class ModeleBillet extends Modele
{

    public function lireTout()
    {
        // Solution simple au problème du comptage des billets : une requête avec un LEFT JOIN et un GROUP BY
        $sql = 'select B.BIL_ID, BIL_DATE, BIL_TITRE, BIL_CONTENU, COUNT(COM_ID) AS NB_COM from T_BILLET B LEFT JOIN T_COMMENTAIRE C ON B.BIL_ID=C.BIL_ID group by B.BIL_ID order by B.BIL_ID desc';
        
        // Solution complexe : cf ControleurBillet
        //$sql = 'select * from T_BILLET order by BIL_ID desc';
        
        return $this->executerLecture($sql);
    }

    public function lireUnSeul($id)
    {
        return $this->executerLecture('select * from T_BILLET where BIL_ID=' . $id, true);
    }

}
